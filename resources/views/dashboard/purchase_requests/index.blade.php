@extends('layouts.app')

@section('content')
	<div class="flex bg-contain orders-background w-full h-full">
		<div class="flex w-full rounded overflow-hidden shadow-lg bg-white ml-40 mr-40 mt-20 mb-20">
			<div class="flex w-full pl-10 pr-10">
				<table class="table-auto w-full">
					<thead class="flex-auto">
						<tr class="flex-auto ml-10 mr-10 w-full">
							<th class="w-1/2 px-4 py-2">Name</th>
							<th class="w-1/2 px-4 py-2">Email</th>
							<th class="w-1/4 px-4 py-2">Item Requested</th>
							<th class="w-1/4 py-4">Price</th>
							<th class="w-1/4 py-4">Accepted</th>
							<th class="w-1/4 py-2">Payment Received</th>
							<th class="w-1/4 py-2">Shipped</th>
							<th class="w-1/4 py-2">Order Complete</th>
						</tr>
					</thead>
					<tbody class="flex-auto w-full">
						<tr class="bg-gray-100 w-full">
							<td class="border px-4 py-2">Bill Jenkins</td>
							<td class="border px-4 py-2">bill.jenkins@alabama.gov</td>
						    <td class="border px-4 py-2">Saudade</td>
						    <td class="border px-4 py-2">25</td>
						    <td class="border px-4 py-2">Yes</td>
						    <td class="border px-4 py-2">Yes</td>
						    <td class="border px-4 py-2">Yes</td>
						    <td class="border px-4 py-2">Yes</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection