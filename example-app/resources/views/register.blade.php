<div
    class="d-flex flex-column justify-center align-center"
    style="
    height: 100vh;
    background-color: rgb(30, 35, 47);
    "
>
    <h2 class="white--text"></h2>
    <div
    class="register-container text-center"
    style="position: relative; z-index: 2"
    >
        <div>
            <div class="text-center">
            <div class="text-h5 white--text">註冊</div>
            </div>
        </div>
        <div class="text-left" style="position: relative">
            <div>
                <span class="white--text text-body-2">帳號</span>
                <input id ="accountInput" class="input-text" type="text" v-model="account" />
            </div>
            <div>
                <span class="white--text text-body-2">密碼</span>
                <input id ="passwordInput" class="input-text" type="password" v-model="password"/>
            </div>
            <div>
                <span class="white--text text-body-2">名字</span>
                <input id ="nameInput" class="input-text" type="text" v-model="name" />
            </div>
            <div>
                <span class="white--text text-body-2">電話</span>
                <input id ="teleInput" class="input-text" type="text" v-model="tele" />
            </div>
            <!--
            <span
            v-if="showError"
            class="red--text"
            style="position: absolute; bottom: -30px"
            >※ 請填入完整資料</span
            >
            -->
        </div>
        <div class="text-center">
            <div id="registerButton" class="btn mb-8" @click="checkRegister">註冊</div>
            <div class="text-body-2">
            </div>
        </div>
    </div>
    <img
        style="position: absolute; top: 30px; left: 120px; z-index: 1"
        src="{{ asset('images/blue.svg') }}"
    />
    <img
        style="position: absolute; top: 50px; right: 120px; z-index: 1"
        src="{{ asset('images/red.svg') }}"
    />
    <img
        style="position: absolute; bottom: -10px; right: 180px; z-index: 1"
        src="{{ asset('images/purple.svg') }}"
    />
</div>
<script>
/*
exports default = {
  data() {
    return {
      showError: false,
    };
  },
  mounted() {
  },
  methods: {
  },
};
*/

document.addEventListener('DOMContentLoaded', function() {
  var registerButton = document.getElementById('registerButton');
  registerButton.addEventListener('click', checkRegister);
});

function checkRegister() {
  var accountInput = document.getElementById('accountInput');
  var passwordInput = document.getElementById('passwordInput');
  var nameInput = document.getElementById('nameInput');
  var teleInput = document.getElementById('teleInput');

  var account = accountInput.value.trim();
  var password = passwordInput.value.trim();
  var name = nameInput.value.trim();
  var tele = teleInput.value.trim();

  if (account === '' || password === '' || name === '' || tele === '') {
    alert('請填入完整資料');
  } else {
    alert('成功註冊');
    accountInput.value = '';  //淨空填空
    passwordInput.value = '';
    nameInput.value = '';
    teleInput.value = '';
    //...
    //下面延伸 : 開始呼叫api將資料送至資料庫儲存
  }
}

</script>
  <style scoped>
  .register-container {
    /* frame login */

    box-sizing: border-box;

    /* Auto layout */

    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 32px;
    gap: 64px;

    width: 480px;
    height: 556px;

    /* Vue Color System/white/0.06 */

    background: rgba(255, 255, 255, 0.06);
    /* Vue Color System/white/0.12 */

    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 10px;
  }

  .input-text {
    width: 416px;
    height: 56px;
    background-color: transparent;

    /* Vue Color System/white/0.6 */

    border: 1px solid rgba(255, 255, 255, 0.6);
    border-radius: 4px;
    outline: none;
    color: #ffffff;
    padding: 2px 12px;
  }

  .btn {
    /* Auto layout */

    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0px 16px;

    width: 416px;
    height: 48px;

    /* primary(10%)/darken-1 */

    background: #4593dc;
    border-radius: 4px;

    color: #ffffff;
    cursor: pointer;
  }

  .btn:hover {
    background: #5598d6;
  }
  .white--text{
    color: #ffffff;
  }
  .red--text{
    color: #ff0101;
  }
  </style>
