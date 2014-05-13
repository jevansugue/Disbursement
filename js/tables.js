var proccess_voucher = 	$(function () {
							$("#processing-vouchers").jqGrid({
								url: "php/tables/processing_vouchers.php",
								datatype: "xml",
								mtype: "GET",
								colNames: ["Inv No", "Date", "Amount", "Tax", "Total", "Notes"],
								colModel: [
									{ name: "invid", width: 55 },
									{ name: "invdate", width: 90 },
									{ name: "amount", width: 80, align: "right" },
									{ name: "tax", width: 80, align: "right" },
									{ name: "total", width: 80, align: "right" },
									{ name: "note", width: 150, sortable: false }
								],
								pager: "#processing-vouchers-pager",
								rowNum: 10,
								rowList: [10, 20, 30],
								sortname: "invid",
								sortorder: "desc",
								viewrecords: true,
								gridview: true,
								autoencode: true,
								caption: "Processing Vouchers"
							}); 

						}); 
										
var forproc_voucher = 	$(function () {
							$("#forproc-vouchers").jqGrid({
								url: "php/tables/forproc_vouchers.php",
								datatype: "xml",
								mtype: "GET",
								colNames: ["Inv No", "Date", "Amount", "Tax", "Total", "Notes"],
								colModel: [
									{ name: "invid", width: 55 },
									{ name: "invdate", width: 90 },
									{ name: "amount", width: 80, align: "right" },
									{ name: "tax", width: 80, align: "right" },
									{ name: "total", width: 80, align: "right" },
									{ name: "note", width: 150, sortable: false }
								],
								pager: "#forproc-vouchers-pager",
								rowNum: 10,
								rowList: [10, 20, 30],
								sortname: "invid",
								sortorder: "asc",
								viewrecords: true,
								gridview: true,
								autoencode: true,
								caption: "For Processing Vouchers"
							}); 

						}); 
						
var returned_voucher = 	$(function () {
							$("#returned-vouchers").jqGrid({
								url: "php/tables/returned_vouchers.php",
								datatype: "xml",
								mtype: "GET",
								colNames: ["Inv No", "Date", "Amount", "Tax", "Total", "Notes"],
								colModel: [
									{ name: "invid", width: 55 },
									{ name: "invdate", width: 90 },
									{ name: "amount", width: 80, align: "right" },
									{ name: "tax", width: 80, align: "right" },
									{ name: "total", width: 80, align: "right" },
									{ name: "note", width: 150, sortable: false }
								],
								pager: "#returned-vouchers-pager",
								rowNum: 10,
								rowList: [10, 20, 30],
								sortname: "invid",
								sortorder: "desc",
								viewrecords: true,
								gridview: true,
								autoencode: true,
								caption: "Returned Vouchers"
							}); 

						}); 
						
var released_voucher = 	$(function () {
							$("#released-vouchers").jqGrid({
								url: "php/tables/released_vouchers.php",
								datatype: "xml",
								mtype: "GET",
								colNames: ["Inv No", "Date", "Amount", "Tax", "Total", "Notes"],
								colModel: [
									{ name: "invid", width: 55 },
									{ name: "invdate", width: 90 },
									{ name: "amount", width: 80, align: "right" },
									{ name: "tax", width: 80, align: "right" },
									{ name: "total", width: 80, align: "right" },
									{ name: "note", width: 150, sortable: false }
								],
								pager: "#released-vouchers-pager",
								rowNum: 10,
								rowList: [10, 20, 30],
								sortname: "invid",
								sortorder: "asc",
								viewrecords: true,
								gridview: true,
								autoencode: true,
								caption: "Released Vouchers"
							}); 

						}); 