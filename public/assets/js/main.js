"use strict";

/* Aside & Navbar: dropdowns */
Array.from(document.getElementsByClassName('dropdown')).forEach(function (elA) {
  elA.addEventListener('click', function (e) {
    if (e.currentTarget.classList.contains('navbar-item')) {
      e.currentTarget.classList.toggle('active');
    } else {
      var dropdownIcon = e.currentTarget.getElementsByClassName('mdi')[1];
      e.currentTarget.parentNode.classList.toggle('active');
      dropdownIcon.classList.toggle('mdi-plus');
      dropdownIcon.classList.toggle('mdi-minus');
    }
  });
});
/* Aside Mobile toggle */

Array.from(document.getElementsByClassName('mobile-aside-button')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    var dropdownIcon = e.currentTarget.getElementsByClassName('icon')[0].getElementsByClassName('mdi')[0];
    document.documentElement.classList.toggle('aside-mobile-expanded');
    dropdownIcon.classList.toggle('mdi-forwardburger');
    dropdownIcon.classList.toggle('mdi-backburger');
  });
});
/* NavBar menu mobile toggle */

Array.from(document.getElementsByClassName('--jb-navbar-menu-toggle')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    var dropdownIcon = e.currentTarget.getElementsByClassName('icon')[0].getElementsByClassName('mdi')[0];
    document.getElementById(e.currentTarget.getAttribute('data-target')).classList.toggle('active');
    dropdownIcon.classList.toggle('mdi-dots-vertical');
    dropdownIcon.classList.toggle('mdi-close');
  });
});
/* Modal: open */

Array.from(document.getElementsByClassName('--jb-modal')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    var modalTarget = e.currentTarget.getAttribute('data-target');
    document.getElementById(modalTarget).classList.add('active');
    document.documentElement.classList.add('clipped');
  });
});
/* Modal: close */

Array.from(document.getElementsByClassName('--jb-modal-close')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    e.currentTarget.closest('.modal').classList.remove('active');
    document.documentElement.classList.remove('is-clipped');
  });
});
/* Notification dismiss */

Array.from(document.getElementsByClassName('--jb-notification-dismiss')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    e.currentTarget.closest('.notification').classList.add('hidden');
  });
});
 
var citis = document.getElementById("city");
var districts = document.getElementById("district");
var wards = document.getElementById("ward");
var Parameter = {
  url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
  method: "GET",
  responseType: "application/json",
};
var promise = axios(Parameter);
promise.then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
  }
  citis.onchange = function () {
    district.length = 1;
    ward.length = 1;
    if (this.value != "") {
      const result = data.filter(n => n.Id === this.value);

      for (const k of result[0].Districts) {
        district.options[district.options.length] = new Option(k.Name, k.Id);
      }
    }
  };
  district.onchange = function () {
    ward.length = 1;
    const dataCity = data.filter((n) => n.Id === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
  };
}



