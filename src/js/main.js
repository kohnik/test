import '../local_modules/jquery/dist/jquery.min';
// import '../local_modules/owl.carousel2/dist/owl.carousel.min';

$(document).ready(() => {
  // set current year
  const thisYear = document.getElementById(`thisYear`);
  if (thisYear) {
    thisYear.innerHTML = `${new Date().getFullYear()}`;
  }

  // // owl carousel2 init
  // $(`#Carousel`).owlCarousel({
  //   items: 5,
  //   loop: true,
  //   nav: false,
  //   dots: false,
  //   autoWidth: true,
  //   autoplay: true,
  //   slideTransition: `linear`,
  //   autoplayTimeout: 2000,
  //   smartSpeed: 1900,
  //   responsive: {
  //     0: {
  //       margin: -20,
  //     },
  //     601: {
  //       margin: -40,
  //     }
  //   }
  // });

  // // send form to email
  // $(`.selector-form`).submit(function () {
  //   // eslint-disable-next-line no-invalid-this
  //   const th = $(this);
  //   $.ajax({
  //     type: `POST`,
  //     url: `../php/mail-simple.php`,
  //     data: th.serialize(),
  //     success() {
  //       th.hide();
  //       $(`.selector-form + .success`).fadeIn();
  //       setTimeout(function () {
  //         th.trigger(`reset`);
  //       }, 1000);
  //     },
  //     error(json) {
  //       console.log(`error`, json);
  //     },
  //   });
  //   return false;
  // });
  // // send form with attachment (add to form enctype='multipart/form-data')
  // if (!window.FormData) {
  //   const div = $(`.selector-form-attach`);
  //   div.innerHTML = `Ваш браузер не поддерживает объект FormData (отправка файла невозможна)`;
  // }
  // $(`.selector-form-attach`).submit(function () {
  //   // eslint-disable-next-line no-invalid-this
  //   const th = $(this);
  //   // eslint-disable-next-line no-undef
  //   const formData = new FormData(th.get(0));
  //   $.ajax({
  //     type: `POST`,
  //     url: `../php/mail.php`,
  //     data: formData,
  //     dataType: `json`,
  //     processData: false,
  //     contentType: false,
  //     beforeSend() {
  //       $(`.selector-form-attach-spinner`).fadeIn();
  //     },
  //     error(json) {
  //       $(`.selector-form-attach-spinner`).fadeOut();
  //       // eslint-disable-next-line no-alert,no-undef
  //       alert(`Ошибка при отправке сообщения`);
  //       console.log(`error`, json);
  //     },
  //     success() {
  //       $(`.selector-form-attach-spinner`).fadeOut();
  //       th.hide();
  //       $(`.selector-form-attach + .success`).fadeIn();
  //       setTimeout(function () {
  //         th.trigger(`reset`);
  //       }, 1000);
  //     },
  //   });
  //   return false;
  // });
  //

  // // Нативная кнопка "Поделиться" на мобильных устройствах
  // // Web Share API доступно для использования в мобильных браузерах через navigator:
  // const shareData = {
  //   title: `My site`,
  //   text: `Hi, visit my site`,
  //   url: `https://my.site.com`,
  // };
  // const btn = document.querySelector(`button`);
  // btn.addEventListener(`click`, async () => {
  //   try {
  //     await navigator.share(shareData);
  //     console.log(`Shared successfully`);
  //   } catch (err) {
  //     console.log(`Sharing not supported`);
  //   }
  // });
  // // Делиться можно как урлом так и файлами:
  // if (navigator.canShare && navigator.canShare({ files: filesArray })) {
  //   navigator.share({
  //     files: filesArray,
  //     title: `Pictures`,
  //     text: `Our Pictures.`,
  //   })
  //     .then(() => console.log(`Share was successful.`))
  //     .catch((error) => console.log(`Sharing failed`, error));
  // } else {
  //   console.log(`Your system doesn't support sharing files.`);
  // }
  // // На данный момент методы работают в safari, ios safari и android chrome

  // mouse parallax
  // $(document).on(`mousemove`, (event) => {
  //   $(`#circle-parallax`).css({
  //     top: event.pageX / 30 - 15,
  //     left: -event.pageY / 30 + 60
  //   });
  // });

  // // плавная нативная прокрутка к элементу (не плавная на ios)
  // const bannerButton = document.getElementById(`bannerButton`);
  // const whatWeDoSection = document.getElementById(`bannerSection`);
  // if (bannerButton) {
  //   bannerButton.addEventListener(`click`, () => {
  //     whatWeDoSection.scrollIntoView({
  //       behavior: `smooth`,
  //       block: `start`
  //     });
  //   });
  // }
});
