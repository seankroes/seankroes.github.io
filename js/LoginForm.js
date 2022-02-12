    function ShowLoginForm() {
    document.getElementsByClassName("b-header-right")[0].style.display = 'none';
    document.getElementsByClassName("b-header-right-form")[0].style.display = 'initial';
    document.getElementsByClassName("b-header-right-form-close")[0].style.display = 'initial';


    if (matchMedia("(max-width: 600px)").matches) {
    document.getElementsByClassName("b-header-title")[0].style.position = 'absolute';
    document.getElementsByClassName("b-header-title")[0].style.left = '18.5%';
     document.getElementsByClassName("b-header-title")[0].style.bottom = '33%';
      }
    }

    function HideLoginForm() {
    document.getElementsByClassName("b-header-right")[0].style.display = 'initial';
    document.getElementsByClassName("b-header-right-form")[0].style.display = 'none';
    document.getElementsByClassName("b-header-right-form-close")[0].style.display = 'none';

    if (matchMedia("(max-width: 600px)").matches) {
    document.getElementsByClassName("b-header-title")[0].style.position = 'initial';
    document.getElementsByClassName("b-header-title")[0].style.left = '0';
      }
    }