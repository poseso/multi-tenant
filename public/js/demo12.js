(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/demo12"],{

/***/ "./resources/js/backend/before.js":
/*!****************************************!*\
  !*** ./resources/js/backend/before.js ***!
  \****************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _plugins__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../plugins */ "./resources/js/plugins.js");
/* harmony import */ var _plugins__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_plugins__WEBPACK_IMPORTED_MODULE_0__);
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// Loaded before Metronic app.js


/***/ }),

/***/ "./resources/js/plugins.js":
/*!*********************************!*\
  !*** ./resources/js/plugins.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
 * Place the CSRF token as a header on all pages for access in AJAX requests
 */
$.ajaxSetup({
  beforeSend: function beforeSend(xhr, type) {
    if (!type.crossDomain) {
      xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
    }
  },
  complete: function complete(response, status, xhr) {
    addDeleteForms();
  }
});
/**
 * Allows you to add data-method="METHOD to links to automatically inject a form
 * with the method on click
 *
 * Example: <a href="{{route('customers.destroy', $customer->id)}}"
 * data-method="delete" name="delete_item">Delete</a>
 *
 * Injects a form with that's fired on click of the link with a DELETE request.
 * Good because you don't have to dirty your HTML with delete forms everywhere.
 */

function addDeleteForms() {
  $('[data-method]').append(function () {
    if (!$(this).find('form').length > 0) {
      return "\n<form action='" + $(this).attr('href') + "' method='POST' name='delete_item' style='display:none'>\n" + "<input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" + "<input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" + '</form>\n';
    } else {
      return '';
    }
  }).attr('href', '#').attr('style', 'cursor:pointer;').attr('onclick', '$(this).find("form").submit();');
}
/**
 * Place any jQuery/helper plugins in here.
 */


$(function () {
  /**
   * Add the data-method="delete" forms to all delete links
   */
  addDeleteForms();
  /**
   * Disable all submit buttons once clicked
   */

  $('form').submit(function () {
    $(this).find('input[type="submit"]').attr('disabled', true);
    $(this).find('button[type="submit"]').attr('disabled', true);
    return true;
  });
  /**
   * Generic confirm form delete using Sweet Alert
   */

  $('body').on('submit', 'form[name=delete_item]', function (e) {
    e.preventDefault();
    var form = this;
    var link = $('a[data-method="delete"]');
    var cancel = link.attr('data-trans-button-cancel') ? link.attr('data-trans-button-cancel') : 'Cancelar';
    var confirm = link.attr('data-trans-button-confirm') ? link.attr('data-trans-button-confirm') : 'Eliminar';
    var title = link.attr('data-trans-title') ? link.attr('data-trans-title') : 'Está seguro que desea eliminarlo?';
    Swal.fire({
      title: title,
      showCancelButton: true,
      confirmButtonText: confirm,
      cancelButtonText: cancel,
      type: 'warning'
    }).then(function (result) {
      result.value && form.submit();
    });
  }).on('click', 'a[name=confirm_item]', function (e) {
    /**
     * Generic 'are you sure' confirm box
     */
    e.preventDefault();
    var link = $(this);
    var title = link.attr('data-trans-title') ? link.attr('data-trans-title') : 'Está seguro que desea hacer esto?';
    var cancel = link.attr('data-trans-button-cancel') ? link.attr('data-trans-button-cancel') : 'Cancelar';
    var confirm = link.attr('data-trans-button-confirm') ? link.attr('data-trans-button-confirm') : 'Continuar';
    Swal.fire({
      title: title,
      showCancelButton: true,
      confirmButtonText: confirm,
      cancelButtonText: cancel,
      type: 'info'
    }).then(function (result) {
      result.value && window.location.assign(link.attr('href'));
    });
  }); // $('[data-toggle="tooltip"]').tooltip();
  // Change Tab on load

  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');
  $('.nav-tabs li > a').on('click', function (e) {
    $(this).tab('show');
    history.pushState(null, null, this.hash);
  });
  $('table').on('draw.dt', function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover({
      trigger: "hover"
    });
    KTApp.initTooltips();
  });
  $('.select2').select2({
    language: {
      noResults: function noResults() {
        return 'Lo sentimos, no hay resultados!';
      }
    },
    width: '100%',
    id: '-1',
    placeholder: function placeholder() {
      $(this).data('placeholder');
    }
  });
});

var initDesktopTooltips = function initDesktopTooltips() {
  if (KTUtil.isInResponsiveRange('desktop')) {
    $('[data-toggle="kt-tooltip-desktop"]').each(function () {
      KTApp.initTooltip($(this));
    });
  } else {
    $('[data-toggle="kt-tooltip-desktop"]').each(function () {
      $(this).tooltip('dispose');
    });
  }
};

initDesktopTooltips();
KTUtil.addResizeHandler(initDesktopTooltips);

/***/ }),

/***/ 1:
/*!**********************************************!*\
  !*** multi ./resources/js/backend/before.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/multi-tenant/resources/js/backend/before.js */"./resources/js/backend/before.js");


/***/ })

},[[1,"/js/manifest"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYmFja2VuZC9iZWZvcmUuanMiLCJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL3BsdWdpbnMuanMiXSwibmFtZXMiOlsiJCIsImFqYXhTZXR1cCIsImJlZm9yZVNlbmQiLCJ4aHIiLCJ0eXBlIiwiY3Jvc3NEb21haW4iLCJzZXRSZXF1ZXN0SGVhZGVyIiwiYXR0ciIsImNvbXBsZXRlIiwicmVzcG9uc2UiLCJzdGF0dXMiLCJhZGREZWxldGVGb3JtcyIsImFwcGVuZCIsImZpbmQiLCJsZW5ndGgiLCJzdWJtaXQiLCJvbiIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImZvcm0iLCJsaW5rIiwiY2FuY2VsIiwiY29uZmlybSIsInRpdGxlIiwiU3dhbCIsImZpcmUiLCJzaG93Q2FuY2VsQnV0dG9uIiwiY29uZmlybUJ1dHRvblRleHQiLCJjYW5jZWxCdXR0b25UZXh0IiwidGhlbiIsInJlc3VsdCIsInZhbHVlIiwid2luZG93IiwibG9jYXRpb24iLCJhc3NpZ24iLCJoYXNoIiwidGFiIiwiaGlzdG9yeSIsInB1c2hTdGF0ZSIsInRvb2x0aXAiLCJwb3BvdmVyIiwidHJpZ2dlciIsIktUQXBwIiwiaW5pdFRvb2x0aXBzIiwic2VsZWN0MiIsImxhbmd1YWdlIiwibm9SZXN1bHRzIiwid2lkdGgiLCJpZCIsInBsYWNlaG9sZGVyIiwiZGF0YSIsImluaXREZXNrdG9wVG9vbHRpcHMiLCJLVFV0aWwiLCJpc0luUmVzcG9uc2l2ZVJhbmdlIiwiZWFjaCIsImluaXRUb29sdGlwIiwiYWRkUmVzaXplSGFuZGxlciJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7OztBQUFBO0FBQUE7QUFBQTtBQUFBOzs7OztBQU1BOzs7Ozs7Ozs7Ozs7QUNOQTs7O0FBR0FBLENBQUMsQ0FBQ0MsU0FBRixDQUFZO0FBQ1JDLFlBQVUsRUFBRSxvQkFBU0MsR0FBVCxFQUFjQyxJQUFkLEVBQW9CO0FBQzVCLFFBQUksQ0FBQ0EsSUFBSSxDQUFDQyxXQUFWLEVB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Q0FBQ2EsV0FBTixDQUFrQnZELENBQUMsQ0FBQyxJQUFELENBQW5CO0FBQ0gsS0FGRDtBQUdILEdBSkQsTUFJTztBQUNIQSxLQUFDLENBQUMsb0NBQUQsQ0FBRCxDQUF3Q3NELElBQXhDLENBQTZDLFlBQVc7QUFDcER0RCxPQUFDLENBQUMsSUFBRCxDQUFELENBQVF1QyxPQUFSLENBQWdCLFNBQWhCO0FBQ0gsS0FGRDtBQUdIO0FBQ0osQ0FWRDs7QUFZQVksbUJBQW1CO0FBQ25CQyxNQUFNLENBQUNJLGdCQUFQLENBQXdCTCxtQkFBeEIsRSIsImZpbGUiOiIvanMvZGVtbzEyLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLyoqXG4gKiBGaXJzdCB3ZSB3aWxsIGxvYWQgYWxsIG9mIHRoaXMgcHJvamVjdCdzIEphdmFTY3JpcHQgZGVwZW5kZW5jaWVzIHdoaWNoXG4gKiBpbmNsdWRlcyBWdWUgYW5kIG90aGVyIGxpYnJhcmllcy4gSXQgaXMgYSBncmVhdCBzdGFydGluZyBwb2ludCB3aGVuXG4gKiBidWlsZGluZyByb2J1c3QsIHBvd2VyZnVsIHdlYiBhcHBsaWNhdGlvbnMgdXNpbmcgVnVlIGFuZCBMYXJhdmVsLlxuICovXG5cbi8vIExvYWRlZCBiZWZvcmUgTWV0cm9uaWMgYXBwLmpzXG5pbXBvcnQgJy4uL3BsdWdpbnMnO1xuIiwiLypcbiAqIFBsYWNlIHRoZSBDU1JGIHRva2VuIGFzIGEgaGVhZGVyIG9uIGFsbCBwYWdlcyBmb3IgYWNjZXNzIGluIEFKQVggcmVxdWVzdHNcbiAqL1xuJC5hamF4U2V0dXAoe1xuICAgIGJlZm9yZVNlbmQ6IGZ1bmN0aW9uKHhociwgdHlwZSkge1xuICAgICAgICBpZiAoIXR5cGUuY3Jvc3NEb21haW4pIHtcbiAgICAgICAgICAgIHhoci5zZXRSZXF1ZXN0SGVhZGVyKCdYLUNTUkYtVG9rZW4nLCAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpKTtcbiAgICAgICAgfVxuICAgIH0sXG4gICAgY29tcGxldGU6IGZ1bmN0aW9uKHJlc3BvbnNlLCBzdGF0dXMsIHhocil7XG4gICAgICAgIGFkZERlbGV0ZUZvcm1zKCk7XG4gICAgfVxufSk7XG5cbi8qKlxuICogQWxsb3dzIHlvdSB0byBhZGQgZGF0YS1tZXRob2Q9XCJNRVRIT0QgdG8gbGlua3MgdG8gYXV0b21hdGljYWxseSBpbmplY3QgYSBmb3JtXG4gKiB3aXRoIHRoZSBtZXRob2Qgb24gY2xpY2tcbiAqXG4gKiBFeGFtcGxlOiA8YSBocmVmPVwie3tyb3V0ZSgnY3VzdG9tZXJzLmRlc3Ryb3knLCAkY3VzdG9tZXItPmlkKX19XCJcbiAqIGRhdGEtbWV0aG9kPVwiZGVsZXRlXCIgbmFtZT1cImRlbGV0ZV9pdGVtXCI+RGVsZXRlPC9hPlxuICpcbiAqIEluamVjdHMgYSBmb3JtIHdpdGggdGhhdCdzIGZpcmVkIG9uIGNsaWNrIG9mIHRoZSBsaW5rIHdpdGggYSBERUxFVEUgcmVxdWVzdC5cbiAqIEdvb2QgYmVjYXVzZSB5b3UgZG9uJ3QgaGF2ZSB0byBkaXJ0eSB5b3VyIEhUTUwgd2l0aCBkZWxldGUgZm9ybXMgZXZlcnl3aGVyZS5cbiAqL1xuZnVuY3Rpb24gYWRkRGVsZXRlRm9ybXMoKSB7XG4gICAgJCgnW2RhdGEtbWV0aG9kXScpLmFwcGVuZChmdW5jdGlvbiAoKSB7XG4gICAgICAgIGlmICghJCh0aGlzKS5maW5kKCdmb3JtJykubGVuZ3RoID4gMCkge1xuICAgICAgICAgICAgcmV0dXJuIFwiXFxuPGZvcm0gYWN0aW9uPSdcIiArICQodGhpcykuYXR0cignaHJlZicpICsgXCInIG1ldGhvZD0nUE9TVCcgbmFtZT0nZGVsZXRlX2l0ZW0nIHN0eWxlPSdkaXNwbGF5Om5vbmUnPlxcblwiICtcbiAgICAgICAgICAgICAgICBcIjxpbnB1dCB0eXBlPSdoaWRkZW4nIG5hbWU9J19tZXRob2QnIHZhbHVlPSdcIiArICQodGhpcykuYXR0cignZGF0YS1tZXRob2QnKSArIFwiJz5cXG5cIiArXG4gICAgICAgICAgICAgICAgXCI8aW5wdXQgdHlwZT0naGlkZGVuJyBuYW1lPSdfdG9rZW4nIHZhbHVlPSdcIiArICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JykgKyBcIic+XFxuXCIgK1xuICAgICAgICAgICAgICAgICc8L2Zvcm0+XFxuJztcbiAgICAgICAgfSBlbHNlIHsgcmV0dXJuICcnIH1cbiAgICB9KVxuICAgICAgICAuYXR0cignaHJlZicsICcjJylcbiAgICAgICAgLmF0dHIoJ3N0eWxlJywgJ2N1cnNvcjpwb2ludGVyOycpXG4gICAgICAgIC5hdHRyKCdvbmNsaWNrJywgJyQodGhpcykuZmluZChcImZvcm1cIikuc3VibWl0KCk7Jyk7XG59XG5cbi8qKlxuICogUGxhY2UgYW55IGpRdWVyeS9oZWxwZXIgcGx1Z2lucyBpbiBoZXJlLlxuICovXG4kKGZ1bmN0aW9uICgpIHtcbiAgICAvKipcbiAgICAgKiBBZGQgdGhlIGRhdGEtbWV0aG9kPVwiZGVsZXRlXCIgZm9ybXMgdG8gYWxsIGRlbGV0ZSBsaW5rc1xuICAgICAqL1xuICAgIGFkZERlbGV0ZUZvcm1zKCk7XG5cbiAgICAvKipcbiAgICAgKiBEaXNhYmxlIGFsbCBzdWJtaXQgYnV0dG9ucyBvbmNlIGNsaWNrZWRcbiAgICAgKi9cbiAgICAkKCdmb3JtJykuc3VibWl0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgJCh0aGlzKS5maW5kKCdpbnB1dFt0eXBlPVwic3VibWl0XCJdJykuYXR0cignZGlzYWJsZWQnLCB0cnVlKTtcbiAgICAgICAgJCh0aGlzKS5maW5kKCdidXR0b25bdHlwZT1cInN1Ym1pdFwiXScpLmF0dHIoJ2Rpc2FibGVkJywgdHJ1ZSk7XG4gICAgICAgIHJldHVybiB0cnVlO1xuICAgIH0pO1xuXG4gICAgLyoqXG4gICAgICogR2VuZXJpYyBjb25maXJtIGZvcm0gZGVsZXRlIHVzaW5nIFN3ZWV0IEFsZXJ0XG4gICAgICovXG4gICAgJCgnYm9keScpLm9uKCdzdWJtaXQnLCAnZm9ybVtuYW1lPWRlbGV0ZV9pdGVtXScsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICBjb25zdCBmb3JtID0gdGhpcztcbiAgICAgICAgY29uc3QgbGluayA9ICQoJ2FbZGF0YS1tZXRob2Q9XCJkZWxldGVcIl0nKTtcbiAgICAgICAgY29uc3QgY2FuY2VsID0gKGxpbmsuYXR0cignZGF0YS10cmFucy1idXR0b24tY2FuY2VsJykpID8gbGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jYW5jZWwnKSA6ICdDYW5jZWxhcic7XG4gICAgICAgIGNvbnN0IGNvbmZpcm0gPSAobGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jb25maXJtJykpID8gbGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jb25maXJtJykgOiAnRWxpbWluYXInO1xuICAgICAgICBjb25zdCB0aXRsZSA9IChsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtdGl0bGUnKSkgPyBsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtdGl0bGUnKSA6ICdFc3TDoSBzZWd1cm8gcXVlIGRlc2VhIGVsaW1pbmFybG8/JztcblxuICAgICAgICBTd2FsLmZpcmUoe1xuICAgICAgICAgICAgdGl0bGU6IHRpdGxlLFxuICAgICAgICAgICAgc2hvd0NhbmNlbEJ1dHRvbjogdHJ1ZSxcbiAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBjb25maXJtLFxuICAgICAgICAgICAgY2FuY2VsQnV0dG9uVGV4dDogY2FuY2VsLFxuICAgICAgICAgICAgdHlwZTogJ3dhcm5pbmcnXG4gICAgICAgIH0pLnRoZW4oKHJlc3VsdCkgPT4ge1xuICAgICAgICAgICAgcmVzdWx0LnZhbHVlICYmIGZvcm0uc3VibWl0KCk7XG4gICAgICAgIH0pO1xuICAgIH0pLm9uKCdjbGljaycsICdhW25hbWU9Y29uZmlybV9pdGVtXScsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIC8qKlxuICAgICAgICAgKiBHZW5lcmljICdhcmUgeW91IHN1cmUnIGNvbmZpcm0gYm94XG4gICAgICAgICAqL1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgICAgY29uc3QgbGluayA9ICQodGhpcyk7XG4gICAgICAgIGNvbnN0IHRpdGxlID0gKGxpbmsuYXR0cignZGF0YS10cmFucy10aXRsZScpKSA/IGxpbmsuYXR0cignZGF0YS10cmFucy10aXRsZScpIDogJ0VzdMOhIHNlZ3VybyBxdWUgZGVzZWEgaGFjZXIgZXN0bz8nO1xuICAgICAgICBjb25zdCBjYW5jZWwgPSAobGluay5hdHRyKCdkYXRhLXRyYW5zLWJ1dHRvbi1jYW5jZWwnKSkgPyBsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNhbmNlbCcpIDogJ0NhbmNlbGFyJztcbiAgICAgICAgY29uc3QgY29uZmlybSA9IChsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNvbmZpcm0nKSkgPyBsaW5rLmF0dHIoJ2RhdGEtdHJhbnMtYnV0dG9uLWNvbmZpcm0nKSA6ICdDb250aW51YXInO1xuXG4gICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICB0aXRsZTogdGl0bGUsXG4gICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxuICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IGNvbmZpcm0sXG4gICAgICAgICAgICBjYW5jZWxCdXR0b25UZXh0OiBjYW5jZWwsXG4gICAgICAgICAgICB0eXBlOiAnaW5mbydcbiAgICAgICAgfSkudGhlbigocmVzdWx0KSA9PiB7XG4gICAgICAgICAgICByZXN1bHQudmFsdWUgJiYgd2luZG93LmxvY2F0aW9uLmFzc2lnbihsaW5rLmF0dHIoJ2hyZWYnKSk7XG4gICAgICAgIH0pO1xuICAgIH0pO1xuXG4gICAgLy8gJCgnW2RhdGEtdG9nZ2xlPVwidG9vbHRpcFwiXScpLnRvb2x0aXAoKTtcbiAgICAvLyBDaGFuZ2UgVGFiIG9uIGxvYWRcbiAgICBsZXQgaGFzaCA9IHdpbmRvdy5sb2NhdGlvbi5oYXNoO1xuICAgIGhhc2ggJiYgJCgndWwubmF2IGFbaHJlZj1cIicgKyBoYXNoICsgJ1wiXScpLnRhYignc2hvdycpO1xuXG4gICAgJCgnLm5hdi10YWJzIGxpID4gYScpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgICQodGhpcykudGFiKCdzaG93Jyk7XG4gICAgICAgIGhpc3RvcnkucHVzaFN0YXRlKG51bGwsbnVsbCwgdGhpcy5oYXNoKTtcbiAgICB9KTtcblxuICAgICQoJ3RhYmxlJykub24oJ2RyYXcuZHQnLCBmdW5jdGlvbigpIHtcbiAgICAgICAgJCgnW2RhdGEtdG9nZ2xlPVwidG9vbHRpcFwiXScpLnRvb2x0aXAoKTtcbiAgICAgICAgJCgnW2RhdGEtdG9nZ2xlPVwicG9wb3ZlclwiXScpLnBvcG92ZXIoe1xuICAgICAgICAgICAgdHJpZ2dlcjogXCJob3ZlclwiXG4gICAgICAgIH0pO1xuICAgICAgICBLVEFwcC5pbml0VG9vbHRpcHMoKTtcbiAgICB9KTtcblxuICAgICQoJy5zZWxlY3QyJykuc2VsZWN0Mih7XG4gICAgICAgIGxhbmd1YWdlOiB7XG4gICAgICAgICAgICBub1Jlc3VsdHM6IGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgICAgIHJldHVybiAnTG8gc2VudGltb3MsIG5vIGhheSByZXN1bHRhZG9zISc7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0sXG4gICAgICAgIHdpZHRoOiAnMTAwJScsXG4gICAgICAgIGlkOiAnLTEnLFxuICAgICAgICBwbGFjZWhvbGRlcjogZnVuY3Rpb24oKXtcbiAgICAgICAgICAgICQodGhpcykuZGF0YSgncGxhY2Vob2xkZXInKTtcbiAgICAgICAgfVxuICAgIH0pO1xufSk7XG5cbmxldCBpbml0RGVza3RvcFRvb2x0aXBzID0gZnVuY3Rpb24oKSB7XG4gICAgaWYgKEtUVXRpbC5pc0luUmVzcG9uc2l2ZVJhbmdlKCdkZXNrdG9wJykpIHtcbiAgICAgICAgJCgnW2RhdGEtdG9nZ2xlPVwia3QtdG9vbHRpcC1kZXNrdG9wXCJdJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIEtUQXBwLmluaXRUb29sdGlwKCQodGhpcykpO1xuICAgICAgICB9KTtcbiAgICB9IGVsc2Uge1xuICAgICAgICAkKCdbZGF0YS10b2dnbGU9XCJrdC10b29sdGlwLWRlc2t0b3BcIl0nKS5lYWNoKGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgJCh0aGlzKS50b29sdGlwKCdkaXNwb3NlJyk7XG4gICAgICAgIH0pO1xuICAgIH1cbn07XG5cbmluaXREZXNrdG9wVG9vbHRpcHMoKTtcbktUVXRpbC5hZGRSZXNpemVIYW5kbGVyKGluaXREZXNrdG9wVG9vbHRpcHMpO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==