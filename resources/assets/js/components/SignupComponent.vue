<template>
    <div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right" >用户名</label>

            <div class="col-md-6">
                <input :class="{'is-invalid':usernameError}" id="name"  @keyup="validate()" v-model="username" type="text" class="form-control" name="USER" value="" required autofocus>
                <span class="invalid-feedback" v-if="usernameError">{{ usernameError }}</span>

            </div>
        </div>

        <div class="form-group row">
            <label for="email"  class="col-md-4 col-form-label text-md-right">邮箱</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="" required>


            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">密码</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>


            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">确认密码</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="button" @click="signup()" class="btn btn-primary">
                    注册
                </button>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "signup-component",
        data:function () {
            return {
                username:'',
                usernameError:'',
            }
        },
        methods:{
            validate:function () {
                this.usernameError = '';
                if (this.username == '') {
                    this.usernameError = "请输入用户名";
                }
            },
            signup:function () {
                $.post('/singup',$(".form-horizontal").serialize(),function (data) {
                    console.info(data);
                });
            }
        }
    }
</script>

<style scoped>

</style>