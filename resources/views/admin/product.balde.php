@extends('admin.master')

<!-- title -->
@section('title')
title
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('keywords')
keywords
@endsection
@section('description')
description
@endsection

<!-- cascle style sheet -->
@section('css')
@endsection

<!-- content -->
@section('content')



<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				لیست تخفیفات

			</header>
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr>
						<th><i class="icon-bullhorn"></i> شرکت</th>
						<th class="hidden-phone"><i class="icon-question-sign"></i> عنوان</th>
						<th><i class="icon-bookmark"></i> قیمت</th>
						<th><i class=" icon-edit"></i> وضعیت</th>
						<th><i class=" icon-"></i> تاریخ اتمام</th>
						<th><i class=" icon-edit"></i> #</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="#">Vector Ltd</a></td>
						<td class="hidden-phone">Lorem Ipsum dorolo imit</td>
						<td>12120.00$ </td>
						<td><span class="label label-info label-mini">Due</span></td>
						<td>
							<button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
							<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
						</td>
					</tr>
					<tr>
						<td>
							<a href="#">Adimin co
							</a>
						</td>
						<td class="hidden-phone">Lorem Ipsum dorolo</td>
						<td>56456.00$ </td>
						<td><span class="label label-warning label-mini">Due</span></td>
						<td>
							<button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
							<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
						</td>
					</tr>
					<tr>
						<td>
							<a href="#">boka soka
							</a>
						</td>
						<td class="hidden-phone">Lorem Ipsum dorolo</td>
						<td>14400.00$ </td>
						<td><span class="label label-success label-mini">Paid</span></td>
						<td>
							<button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
							<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
						</td>
					</tr>
					<tr>
						<td>
							<a href="#">salbal llb
							</a>
						</td>
						<td class="hidden-phone">Lorem Ipsum dorolo</td>
						<td>2323.50$ </td>
						<td><span class="label label-danger label-mini">Paid</span></td>
						<td>
							<button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
							<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
						</td>
					</tr>
					<tr>
						<td><a href="#">Vector Ltd</a></td>
						<td class="hidden-phone">Lorem Ipsum dorolo imit</td>
						<td>12120.00$ </td>
						<td><span class="label label-primary label-mini">Due</span></td>
						<td>
							<button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
							<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
						</td>
					</tr>
					<tr>
						<td>
							<a href="#">Adimin co
							</a>
						</td>
						<td class="hidden-phone">Lorem Ipsum dorolo</td>
						<td>56456.00$ </td>
						<td><span class="label label-warning label-mini">Due</span></td>
						<td>
							<button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
							<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
						</td>
					</tr>
					<tr>
						<td><a href="#">Vector Ltd</a></td>
						<td class="hidden-phone">Lorem Ipsum dorolo imit</td>
						<td>12120.00$ </td>
						<td><span class="label label-success label-mini">Due</span></td>
						<td>
							<button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
							<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
						</td>
					</tr>
					<tr>
						<td>
							<a href="#">Adimin co
							</a>
						</td>
						<td class="hidden-phone">Lorem Ipsum dorolo</td>
						<td>56456.00$ </td>
						<td><span class="label label-warning label-mini">Due</span></td>
						<td>
							<button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
							<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
						</td>
					</tr>
					<tr>
						<td><a href="#">Vector Ltd</a></td>
						<td class="hidden-phone">Lorem Ipsum dorolo imit</td>
						<td>12120.00$ </td>
						<td><span class="label label-info label-mini">Due</span></td>
						<td>
							<button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
							<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
						</td>
					</tr>
					<tr>
						<td>
							<a href="#">Adimin co
							</a>
						</td>
						<td class="hidden-phone">Lorem Ipsum dorolo</td>
						<td>56456.00$ </td>
						<td><span class="label label-warning label-mini">Due</span></td>
						<td>
							<button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
							<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
						</td>
					</tr>
				</tbody>
			</table>
		</section>
	</div>
</div>

@endsection

<!-- javascript -->
@section('js')



@endsection