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
								rowNum: 20,
								rowList: [20, 30, 40],
								sortname: "invid",
								sortorder: "desc",
								viewrecords: true,
								gridview: true,
								autoencode: true,
								caption: "Processing Vouchers",
								
							}); 

						}); 
										
var forproc_voucher = 	$(function () {
							$("#forproc-vouchers").jqGrid({
								url: "php/tables/forproc_vouchers.php",
								datatype: "xml",
								mtype: "GET",
								colNames: ["Inv No", "Date", "Amount", "Tax", "Total", "Notes", "Inv No2", "Date2", "Amount2", "Tax2", "Total2", "Notes2"],
								colModel: [
									{ name: "invid", width: 55 },
									{ name: "invdate", width: 90 },
									{ name: "amount", width: 80, align: "right" },
									{ name: "tax", width: 80, align: "right" },
									{ name: "total", width: 80, align: "right" },
									{ name: "note", width: 80, sortable: false },
									{ name: "invid2", width: 55 },
									{ name: "invdate2", width: 90 },
									{ name: "amount2", width: 80, align: "right" },
									{ name: "tax2", width: 80, align: "right" },
									{ name: "total2", width: 80, align: "right" },
									{ name: "note2", width: 80, sortable: false }
								],
								pager: "#forproc-vouchers-pager",
								rowNum: 20,
								rowList: [20, 30, 40],
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
								rowNum: 20,
								rowList: [20, 30, 40],
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
								rowNum: 20,
								rowList: [20, 30, 40],
								sortname: "invid",
								sortorder: "asc",
								viewrecords: true,
								gridview: true,
								autoencode: true,
								caption: "Released Vouchers"
							}); 

						}); 