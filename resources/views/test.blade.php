@php

    $response = \Http::withHeaders([
        'authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYmEwOTNlNmZlN2VjZTY2ODMyMTU5ZTE3NTc2Nzc5NzM4YmVjM2FmNGRkYWJlN2VhN2YyZDY2ZmVmZGY3MmFlNmRmNWVlOGFkY2ZiNmI2YmIiLCJpYXQiOjE2ODI0MTI1NjMuOTU3NDcsIm5iZiI6MTY4MjQxMjU2My45NTc0NzIsImV4cCI6MTY4MjQ5ODk2My45NTI1OTcsInN1YiI6IjQzNTUxMCIsInNjb3BlcyI6W119.Yt-67xsY4l_sYywiveZyZWAPUt-wirrqMkJ_vPcOWJGaC_OfURyPi8vHRay_QVR8_aEkfGZylodrNSm33pQGVnQBSQkgTznUZYjo506z9Jol7Fky9Nr4oMNt0TrlobD5orgXrVQGhrWZhp8JyFAxtk_l67PAU5dW2-pgiQjNvenDJLesY-lMYPw50Mhmt1kbTfEHurpBGSGsAr27bcnF9x0v56MMWRHiiVGQ9c8cIA9fDnkSiI7Ot5PpHtIJgtO1otMNv7ZLzlAdkDnUZMZokbwEYV1aBwocyeu1sh6SaoGiLocqSl5jsmbfCYNsFTCxtBsFIuNSJ4j8zIAmbQHnX_1N5kkjh-zuNJmdFTxZKdGORJ7jAcv0D_gLgMwfd0XvdKuErlzALy2AigexC9YlzDukTYZjHLzFLzlNRgY4wGc0L8QxEk_pBEteXfd8aWjn5QfWa2azfA4bmJQZUrdlbyNh-7saiKUA31vMKaMPDk-F5vZE9-YWDoNYY54JpUuiJjHyuBJqHLGL7oXHN3L4wySdCbcd7pku1TJi0GR5VTDIhxlb6FkWmKRSCwLzfloTTXnRbJIqrABMjAdElOmCeBcW7-ZWjC4dhbZon-s2CrXaeWhBhORnDTz5ZU7mzLi70ExnsNL_DKT1vRnSW0pROQufMeyGiPbUu2F1JZ-P1mU'
])
        ->get('https://sprint.solitaire.plure.com/sdk-tournaments/api/v1/balance/all');

    dump($response->body());

@endphp
<script>

    // let url = new window.URL('https://sprint.solitaire.plure.com/sdk-tournaments/api/v1/test?foo=bar');
    // let pathname = url.pathname;
    //
    // let requestUrl = pathname.replace('/sdk-tournaments/api/v1/', '');
    //
    // console.log(requestUrl + url.search);



</script>
