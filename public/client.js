window.onload=()=>
{
    document.querySelector('#repass').onblur=()=>
    {
        if(document.querySelector('#repass').value !=
            document.querySelector('#pass').value)
        {
            document.querySelector('#repass').value ="";
            document.querySelector('#pass').value="";
            alert('輸入不相同');
        }
    }
    document.querySelector('#pass').onblur=()=>
    {
        if((document.querySelector('#pass').value).length < 8)
        {
            document.querySelector('#pass').value="";
            alert('密碼太短');
        }
        $pass = document.querySelector('#pass').value;
        if (/[a-z]/.test($pass) && /[A-Z]/.test($pass))
        {
            if(!(/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test($pass)))
            {
                alert('密碼需含有特殊符號');
                document.querySelector('#pass').value="";
            }
        }
        else
        {
            alert('密碼強度太低');
            document.querySelector('#pass').value="";
        }
    }

}