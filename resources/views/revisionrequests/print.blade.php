
<style type="text/css">
	body{
		font-size:9pt;
		font-family:Calibri;
	}

	.footer div{
		font-family:Arial;
		font-size:5pt;
	}

	.tbl-info tbody tr td{
		font-size:11pt;
		padding: 10px;
		border:1px solid black;
	}

	.tbl-terms tr td{
		font-size:9pt;
	}

	.tbl-addlinfo tr td{
		font-size:11pt;
		margin:0;
		line-height:1.0;
	}

	.footer div{
		font-family:Arial;
		font-size:5pt;
	}

	.footer, .header{
		display:none;
	}

	@media  print{
		body { margin:0px; }

		.header{
			display: block;
			position: fixed;
			padding-top: 10px;
			height: 100px;
			margin: auto;
		}

		.footer{
			display:block;
			position: fixed;
			width:100%;
			bottom: 0;
		}

		.next-page{page-break-after:always}
	}

	@page  { margin: 2mm; }
</style>

<div style="width:90%; margin:auto; padding-top: 85px;">

	<div style="text-align:center; font-size:12pt; font-weight:normal; margin-bottom:7px;">REVISION REQUEST

		<table class="tbl-info" style="width:100%; border: 1px solid; border-bottom: 0px; margin-top: 7px;">
			<tbody>
			<tr>

				<td style="width:65%;">
					<div>
						Date: &nbsp;&nbsp;{{ $revisionRequest->created_at->toFormattedDateString() }} <br>
						To: Jenny Fajardo-Ludovico <br>
						From: {{ $revisionRequest->user_name }}
					</div>
				</td>

				<td style="width:35%;">
					<div>
						Revision Request No: <br> {{ $revisionRequest->revision_request_number }}
					</div>
				</td>

			</tr>
			</tbody>
		</table>

		<table class="tbl-info" style="width:100%; border: 1px solid; border-top: 0px; margin-bottom: 10px;">
			<tbody>
			<tr>
				<td>
					<div>
						Section A: Formal Requests <br>
						This is to formalize a request for a revision to the document as follows: <br> <br>
						Section / Procedure / Page Number: {{ $revisionRequest->reference_document_tags }} <br>
						Revision Date / Status: Open<br>
						Proposed Revision Details: &nbsp;&nbsp; (Please see the attached file at the back.) <br>
						Reason for Revision: {{ $revisionRequest->revision_reason }} <br>

					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						Section B: QMR's Recommendation <br>
						For Approval/Disapproval (Delete as Appropriate) <br>
						Reason for Recommendation: {{ $revisionRequest->section_b->recommendation_reason }} <br>
						<table style="width: 100%;">
							<tr>
								<td style="width:1%; white-space:nowrap; border: 0px;">Signature of QMR: </td>
								<td background="{{ url('img/sample_signature.gif') }}" style="border-top: 0px; border-left: 0px; border-right: 0px; text-align: center; background-size:contain; background-position: center; background-repeat:no-repeat;"></td>
								<td style="width:1%; white-space:nowrap; border: 0px;">Date: </td>
								<td style="border-top: 0px; border-left: 0px; border-right: 0px; text-align: center; width: 30%;">{{ $revisionRequest->section_b->created_at->toFormattedDateString()}}</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						Section C: Approval / Disapproval <br>
						For Approval/Disapproval (Delete as Appropriate) <br>
						<div style="width: 100%px; border-bottom: 1px solid black; margin-top: 22px;">

						</div>
						<table style="width: 100%;">
							<tr>
								<td style="width:1%; white-space:nowrap; border: 0px;">Signature of Chief Executive Officer: </td>
								<td
										@if($revisionRequest->section_c)
										@if($revisionRequest->section_c->approved)
										background="{{ url('img/limocon.jpg') }}"
										@endif
										@endif
										style="border-top: 0px; border-left: 0px; border-right: 0px; text-align: center; background-size:contain; background-position: center; background-repeat:no-repeat;"></td>
								<td style="width:1%; white-space:nowrap; border: 0px;">Date: </td>
								<td style="border-top: 0px; border-left: 0px; border-right: 0px; text-align: center; width: 30%;">
									@if($revisionRequest->section_c)
										@if($revisionRequest->section_c->approved)
											{{ $revisionRequest->section_b->created_at->toFormattedDateString()}}
										@endif
									@endif
								</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						Section D: Action Taken <br>
						Document Revised/Up-dated/Distributed to Holders (Delete as Appropriate)/Others <br>
						(Please Specify):
						@if($revisionRequest->section_d)
							{{ $revisionRequest->section_d->action_taken }}
							@if($revisionRequest->section_d->others)
								{{ ', ' . $revisionRequest->section_d->others }}
							@endif
						@endif
						<br>
						<table style="width: 100%;">
							<tr>
								<td style="width:1%; white-space:nowrap; border: 0px;">Signature of QMR: </td>
								<td background="
									@if($revisionRequest->section_d)
								{{ url('img/sample_signature.gif') }}
								@endif
										" style="border-top: 0px; border-left: 0px; border-right: 0px; text-align: center; background-size:contain; background-position: center; background-repeat:no-repeat;"></td>
								<td style="width:1%; white-space:nowrap; border: 0px;">Date: </td>
								<td style="border-top: 0px; border-left: 0px; border-right: 0px; text-align: center; width: 30%;">
									@if($revisionRequest->section_d)
										{{ $revisionRequest->section_d->created_at->toFormattedDateString()}}
									@endif
								</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
			</tbody>
		</table>

		<div class="" style="text-align:left;">
			NSCPi-QM-006-07/10July2015
		</div>

	</div>

</div>

<script type="text/javascript" src="{{ url('js/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
	$(function(){window.print();});
</script>
