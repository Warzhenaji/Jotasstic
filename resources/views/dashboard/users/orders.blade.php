@extends('layouts.app')

@section('content')
	<div class="flex bg-contain orders-background w-full h-full">
		<div class="flex w-full rounded overflow-hidden shadow-lg bg-white ml-40 mr-40 mt-20 mb-20">
			<table class="table-auto">
				<thead class="flex content-between">
					<tr class="justify-start">
						<th class="w-1/2 px-4 py-2">Name</th>
						<th class="w-1/4 px-4 py-2">Item Ordered</th>
						<th class="w-1/4 py-2">Price</th>
						<th class="w-1/4 py-2">Payment Received</th>
						<th class="w-1/4 py-2">Shipped</th>
						<th class="w-1/4 py-2">Order Complete</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="border px-4 py-2">Bill Jenkins</td>
					    <td class="border px-4 py-2">Saudade</td>
					    <td class="border px-4 py-2">25</td>
					    <td class="border px-4 py-2">Yes</td>
					    <td class="border px-4 py-2">Yes</td>
					    <td class="border px-4 py-2">Yes</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection