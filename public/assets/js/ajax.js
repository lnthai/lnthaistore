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
function insert(page, event) {
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
        loadPage(page, this);
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
//update
function update(page, event) {
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
//response
function responseTable(page, event) {
  event.preventDefault();
  $.ajax({
    url: page,
    type: "GET",
    success: function (response) {
      $('#responseTable').html(response);
    }
  });
}
//delete
function deleteUser(page, id, event) {
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
          loadPage('/admin/user/list', this);
          closeModal(id);
        });
      }
    }
  })
};
//
function deleteOrders(page, id, event) {
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
          loadPage('/admin/order/list', this);
          closeModal(id);
        });
      }
    }
  })
};
// insert order
function insertOrder(page, method, event) {
  event.preventDefault();
  var formData = new FormData(document.getElementById('form-data'));
  formData.append(method, true);
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
        loadPage(page, this);
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
//checkout
function checkOut(page, event) {
  event.preventDefault();
  var name = document.getElementById("name").value;
  var phone = document.getElementById("phone").value;
  var city = document.getElementById("city").value;
  var district = document.getElementById("district").value;
  var ward = document.getElementById("ward").value;

  var errors = false;

  // Tên
  if (name.trim() === '') {
    document.getElementById("name-error").innerText = 'Vui lòng nhập họ và tên.';
    errors = true;
  } else {
    document.getElementById("name-error").innerText = '';
  }

  // Số điện thoại
  if (phone.trim() === '') {
    document.getElementById("phone-error").innerText = 'Vui lòng nhập số điện thoại.';
    errors = true;
  } else {
    document.getElementById("phone-error").innerText = '';
  }

  if (city.trim() === '' || district.trim() === '' || ward.trim() === '') {
    document.getElementById("address-error").innerText = 'Vui lòng chọn địa chỉ.';
    errors = true;
  } else {
    document.getElementById("address-error").innerText = '';
  }


  if (errors) {
    return;
  }
  var formData = new FormData(document.getElementById('form-data1'));
  formData.append('checkout', true);

  // Gửi yêu cầu Ajax
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
        loadPage(page, this);
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

//delete order
function deleteOrder(page, id, event) {
  event.preventDefault();
  $.ajax({
    url: page,
    type: "POST",
    data: { id: id, delete: true },
    success: function (response) {
      var result = JSON.parse(response);
      if (result.success) {
        Swal.fire({
          icon: 'success',
          title: result.message,
          showConfirmButton: false,
          timer: 2000,
        });
        loadPage(page, this);
      } else {
        // Hiển thị lỗi từ server
        Swal.fire({
          icon: 'error',
          title: 'Lỗi',
          text: result.message,
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

$(document).ready(function () {
  $('#product-select').change(function () {
    var productId = $(this).val();
    if (productId !== '0') {
      $.ajax({
        type: 'POST',
        url: '/admin/order/list',
        data: 'id=' + productId,
        dataType: 'json',
        success: function (response) {
          var quantity = response.quantity;
          $('#product-quantity').text('Còn lại ' + quantity + ' sản phẩm');
        }
      });
    } else {
      $('#product-quantity').text('');
    }
  });
});
