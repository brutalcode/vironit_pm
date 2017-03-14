(function($) {
  $(function () {
  	var capexCount = 0;
  	var opexCount = 0;
  	var incomesCount = 0;

    // $("#block-views-exp-view-ideas-page .views-widget-filter-field_parent_project_nid,#block-views-exp-view-ideas-page .views-widget-sort-by,#block-views-exp-view-ideas-page .views-widget-sort-order, #block-views-exp-view-ideas-page .views-submit-button").addClass("col-md-12");
    $('.tabs ul').removeClass('tabs primary');
    $('.tabs ul').addClass('nav nav-tabs');
    $('.not-logged-in aside').addClass('col-md-4 col-md-offset-4');
    $('.autocomplete-deluxe-item').addClass('btn btn-default');

    $('.page-user-register h1.page-title').html("Login");
    $('.page-user-register ol.breadcrumb li:last-child').html("");

    $('#idea-costs-form, #idea-incomes-form, #idea-report-form').addClass('navbar-form navbar-left');

    $('#edit-add-capex').click(function(){
    	capexCount++;
			$('.idea-capex-table .information_json_plus').before(
			'<tr>' +
				'<td><input type="text" class="form-control" name="capex-cost-title-' + capexCount + '"placeholder="" form="idea-costs-form"></td>' +
				'<td><input type="text" class="form-control" name="capex-cost-amount-' + capexCount + '" placeholder="" form="idea-costs-form"></td>' +
				'<td><input type="text" class="form-control" name="capex-cost-quantity-' + capexCount + '" placeholder="" form="idea-costs-form"></td>' +
				'<td><span class="btn btn-danger my-minus pull-right">&ndash;</span></td>' +
			'</tr>'
			);
		});
    $('#edit-add-opex').click(function(){
    	opexCount++;
			$('.idea-opex-table .information_json_plus').before(
			'<tr>' +
				'<td><input type="text" class="form-control" name="opex-cost-title-' + opexCount + '"placeholder="" form="idea-costs-form"></td>' +
				'<td><input type="text" class="form-control" name="opex-cost-amount-' + opexCount + '" placeholder="" form="idea-costs-form"></td>' +
				'<td><input type="text" class="form-control" name="opex-cost-quantity-' + opexCount + '" placeholder="" form="idea-costs-form"></td>' +
				'<td><input type="text" class="form-control" name="opex-cost-period-' + opexCount + '" placeholder="" form="idea-costs-form"></td>' +
				'<td><span class="btn btn-danger my-minus pull-right">&ndash;</span></td>' +
			'</tr>'
			);
		});
    $('#edit-add-income').click(function(){
    	incomesCount++;
			$('.idea-incomes-table .information_json_plus').before(
			'<tr>' +
				'<td><input type="text" class="form-control" name="income-title-' + incomesCount + '"placeholder="" form="idea-incomes-form"></td>' +
				'<td><input type="text" class="form-control" name="income-amount-' + incomesCount + '" placeholder="" form="idea-incomes-form"></td>' +
				'<td><input type="text" class="form-control" name="income-quantity-' + incomesCount + '" placeholder="" form="idea-incomes-form"></td>' +
				'<td><input type="text" class="form-control" name="income-period-' + incomesCount + '" placeholder="" form="idea-incomes-form"></td>' +
				'<td><span class="btn btn-danger my-minus pull-right">&ndash;</span></td>' +
			'</tr>'
			);
		});
		$(document).on('click', '.my-minus', function(){
			$(this).closest( 'tr' ).remove(); // удаление строки с полями
		});

  });
})(jQuery);
