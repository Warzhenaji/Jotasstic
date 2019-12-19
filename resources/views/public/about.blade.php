@extends('layouts.app')

@section('content')

	<div class="flex bg-contain about-background w-full">
		<!-- Background photograph by Jotasstic Photography -->
		<div class="flex justify-center items-center w-full h-screen">
			<div class="flex h-full justify-center max-w-lg w-full lg:max-w-full lg:flex pt-12 pb-12">
			  <div class="h-64 lg:h-auto lg:w-64 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden about-card-background" title="Jo portrait">
			  </div>
				  <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
					    <div class="mb-8">
					      <div class="text-gray-900 font-bold text-xl mb-2">Meet Jo!</div>
					      <div>
					      	<p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
					  	  </div>
					  	  <div>
					  	  	<p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
					  	  </div>
					    </div>
				  </div>
			</div>
		</div>
	</div>
		
@endsection