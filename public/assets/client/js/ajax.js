function loadPage(page, link) {
  $.ajax({
    url: page,
    type: 'GET',
    success: function (data) {
      // Update content container with loaded data
      $('#app').html(data);

      // Remove 'active' class from all <li> elements
      // $('ul li').removeClass('active');

      // Add 'active' class to the parent <li> of the clicked <a>
      // $(link).closest('li').addClass('active');

      // Update URL using HTML5 History API
      history.pushState({ page: page }, '', page);
      document.body.scrollIntoView({ behavior: 'auto', block: 'start' });
    }
  });
}
window.addEventListener('popstate', function (event) {
  if (event.state && event.state.page) {
    var link = $('a[href="' + event.state.page + '"]');
    loadPage(event.state.page, link);
  }
});
// insert 
function insert(page, title, id, name, price, image, event) {
  event.preventDefault();
  $.ajax({
    url: page,
    type: "POST",
    data: 'id=' + id + '&name=' + name + '&price=' + price + '&image=' + image,
    success: function (response) {
      Swal.fire({
        icon: 'success',
        title: title,
        showConfirmButton: false,
        timer: 2000,
      })
      clearFormData()
    }
  })
};
//update
function update(page, event) {
  event.preventDefault();
  $.ajax({
    url: page,
    type: "POST",
    data: $("#form-data").serialize(),
    success: function (response) {
      if (response.error) {
        Swal.fire({
          icon: 'error',
          title: 'Lỗi',
          text: response.error,
        });
      } else {
        Swal.fire({
          icon: 'success',
          title: 'Cập nhật thành công',
          showConfirmButton: false,
          timer: 2000,
        });
      }
    }
  })
};
//delete
function deletes(page, id, event) {
  event.preventDefault();
  $.ajax({
    url: page,
    type: "POST",
    data: 'id=' + id,
    success: function (response) {
      if (response.error) {
        Swal.fire({
          icon: 'error',
          title: 'Lỗi',
          text: response.error,
        });
      } else {
        Swal.fire({
          icon: 'success',
          title: 'Đã xóa',
          showConfirmButton: false,
          timer: 2000,
        }).then(() => {
          window.history.pushState({}, '', '/admin/user/list');
          closeModal(id);
        });
      }
    }
  })
};
//clear input
function clearFormData() {
  // Lấy tất cả các trường input trong form
  var formInputs = document.getElementById("form-data").getElementsByTagName("input");

  // Đặt giá trị của mỗi trường input thành chuỗi rỗng
  for (var i = 0; i < formInputs.length; i++) {
    formInputs[i].value = "";
  }
}
//close modal
function closeModal(id) {
  var modal = document.getElementById("sample-modal" + id);
  modal.style.display = "none";
}
// + quantity cart
function upQuantity(id, event) {
  event.preventDefault();
  // var qty = document.getElementById("qty").value;
  // $.ajax({
  //   url: '/cart/upqty',
  //   type: "POST",
  //   data: 'id='+ id + '&qty='+ qty,
  //   success: function(data){
  //     $("#cart").append(data);
  //   }
  // });
}

function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password");
  var eyeIcon = document.getElementById("eye");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eyeIcon.classList.remove("mdi-eye-off");
    eyeIcon.classList.add("mdi-eye");
  } else {
    passwordInput.type = "password";
    eyeIcon.classList.remove("mdi-eye");
    eyeIcon.classList.add("mdi-eye-off");
  }
}
function togglePasswordVisibility1() {
  var passwordInput = document.getElementById("password1");
  var eyeIcon = document.getElementById("eye1");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eyeIcon.classList.remove("mdi-eye-off");
    eyeIcon.classList.add("mdi-eye");
  } else {
    passwordInput.type = "password";
    eyeIcon.classList.remove("mdi-eye");
    eyeIcon.classList.add("mdi-eye-off");
  }
}

function register(page, event) {
  event.preventDefault();
  var formData = new FormData(document.getElementById('form-data'));
  var loading = document.getElementById('loading');
  loading.style.display = 'block';
  setTimeout(function () {
    loading.style.display = 'none';
  }, 5000);
  $.ajax({
    url: page,
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      var result = JSON.parse(response);
      if (result.success) {
        // Chuyển hướng đến trang confirm sau khi gửi email thành công
        loadPage('/confirm', this);
      } else {
        // Hiển thị lỗi từ server nếu cần
        Swal.fire({
          icon: 'error',
          title: 'Lỗi',
          text: 'Có lỗi xảy ra trong quá trình đăng kí.',
        });
      }
    },
    error: function (xhr, status, error) {
      console.log(xhr.responseText); // In ra lỗi nếu có
      console.log(status);
      console.log(error);
    }
  });
}

function confirm(page, event) {
  event.preventDefault();
  var formData = new FormData(document.getElementById('form-data'));
  $.ajax({
    url: page,
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var result = JSON.parse(response);
      if (result.success) {
        Swal.fire({
          icon: 'success',
          title: result.message,
          showConfirmButton: false,
          timer: 2000,
        });
        loadPage('/signin', this);
      } else {
        // Hiển thị lỗi từ server
        Swal.fire({
          icon: 'error',
          title: 'Lỗi',
          text: result.message,
        });
      }
    },
    error: function () {
      // Xử lý lỗi Ajax nếu có
      Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: 'Có lỗi xảy ra trong quá trình xử lý.',
      });
    }
  });
};

function loginClient(page, event) {
  event.preventDefault();
  var formData = new FormData(document.getElementById('form-data'));
  $.ajax({
    url: page,
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var result = JSON.parse(response);
      if (result.success === true) {
        loadPage('/home', this);
      } else {
        loadPage('/signin', this);
      }
    },
    error: function () {
      // Xử lý lỗi Ajax nếu có
      Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: 'Có lỗi xảy ra trong quá trình xử lý.',
      });
    }
  });
};

function logout(page) {
  $.ajax({
    url: page,
    type: 'GET',
    success: function (data) {
      // Update content container with loaded data
      $('#app').html(data);

      location.reload();
    }
  });
}

function forgot(page, event) {
  event.preventDefault();
  var formData = new FormData(document.getElementById('form-data'));
  var loading = document.getElementById('loading');
  loading.style.display = 'block';
  setTimeout(function () {
    loading.style.display = 'none';
  }, 5000);
  $.ajax({
    url: page,
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var result = JSON.parse(response);
      if (result.success) {
        Swal.fire({
          icon: 'success',
          title: result.message,
          showConfirmButton: false,
          timer: 2000,
        });
        clearFormData();
      } else {
        // Hiển thị lỗi từ server
        Swal.fire({
          icon: 'error',
          title: 'Lỗi',
          text: result.message,
        });
      }
    },
    error: function () {
      // Xử lý lỗi Ajax nếu có
      Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: 'Có lỗi xảy ra trong quá trình xử lý.',
      });
    }
  });
};

function resetpass(page, event) {
  event.preventDefault();
  var urlParams = new URLSearchParams(window.location.search);
  var token = urlParams.get('token');
  var email = urlParams.get('email');
  var formData = new FormData(document.getElementById('form-data'));
  
  // Thêm thông tin từ URL vào dữ liệu form
  formData.append('token', token);
  formData.append('email', email);

  $.ajax({
    url: page,
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var result = JSON.parse(response);
      if (result.success) {
        Swal.fire({
          icon: 'success',
          title: result.message,
          showConfirmButton: false,
          timer: 2000,
        });
        loadPage('/signin',this);
      } else {
        // Hiển thị lỗi từ server
        Swal.fire({
          icon: 'error',
          title: 'Lỗi',
          text: result.message,
        });
      }
    },
    error: function () {
      // Xử lý lỗi Ajax nếu có
      Swal.fire({
        icon: 'error',
        title: 'Lỗi',
        text: 'Có lỗi xảy ra trong quá trình xử lý.',
      });
    }
  });
};



