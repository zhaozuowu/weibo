<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class Signup extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'username' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|mix:12'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '请输入用户名',
            'email.required' => '请输入邮箱',
            'password.required' => '请输入密码',
        ];
    }

    public function response(array $errors)
    {
        if ($this->ajax() || $this->wantsJson()) {

            $errorInfo = '';
            foreach ($errors as $column => $error) {
                foreach ($error as $item) {
                    $errorInfo .= $item . "<br/>";
                }
            }
            $ajaxErrros = ['code' => -1, 'msg' => $errorInfo];
            return new JsonResponse($ajaxErrros, 200);
        }
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);

    }


}
