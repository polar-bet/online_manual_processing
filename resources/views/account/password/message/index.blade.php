@vite('resources/scss/password_message.scss')
<div class="main">
    <div class="main__header" style="background-color: #173aff; height: 70px; display: flex; align-items: center; padding-left: 40px">
        <h1 style="color: white; font-size: 20px">Онлайн-посібник Processing</h1></div>
    <div class="main__container">
        <h2>Відновлення паролю</h2>
        <p style="font-size: 20px">Шановний користувачу,<br><br>
            Якщо ви забули свій пароль і бажаєте відновити доступ до свого облікового запису, ми готові допомогти вам з
            цим
            процесом. Будь ласка, скористайтесь посиланням нижче, щоб почати процедуру відновлення паролю:<br><br>
            <a href="{{route('account.password.reset.index', $token)}}">Відновити пароль</a> <br><br>
            Після кліку на посилання, вас буде перенаправлено на сторінку відновлення паролю. Будьте уважні при введенні
            нового паролю і впевніться, що використовуєте надійний пароль, який складається з комбінації букв, цифр та
            символів. Рекомендується використовувати унікальний пароль, який не використовується для інших облікових
            записів.<br><br>
            Якщо у вас виникли будь-які труднощі або потрібна додаткова допомога, зв'яжіться з нашою службою підтримки
            за
            адресою <a href="mailto:onlinemanualprocessing@gmail.com">onlinemanualprocessing@gmail.com</a>. Ми завжди готові допомогти вам з
            відновленням доступу до вашого облікового запису.</p>
        <div style="font-size: 18px">— З повагою, Адміністрація Онлайн-посібника «Креативне програмування. Processing»</div>
    </div>
</div>
