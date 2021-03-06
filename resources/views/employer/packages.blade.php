@extends('employer.layout.app')

@section('title', 'HRBDJobs | Employer Dashboard')

@section('content')
<div id="nav_height"></div>
	<section class="overlape">
		<div class="block no-padding">
			<img src="{{ asset('images/top_add.jpg') }}" alt="Advertisement banner">
		</div>
	</section>

	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<aside class="col-lg-3 column border-right">
				 		<div class="widget">
				 			@include('employer.layout.sidebar')
				 		</div>

				 	</aside>
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
                             <div class="profile-title">
					 			<h3>Packages</h3>
							 </div>
					 		<div class="manage-jobs-sec mb50">

                                {{-- top border line --}}
							    <div class="border-line"></div>

                                <div class="col-lg-12">
                                    <div class="tab-sec text-center">
                                        <ul class="nav nav-tabs">
                                            <li>
                                                <a class="current" data-tab="fjobs">Packages</a>
                                            </li>
                                            <li>
                                                <a data-tab="rjobs">Featured Packages</a>
                                            </li>
                                        </ul>
                                        <div id="fjobs" class="tab-content current">
                                            <div class="job-listings-tabs">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <table class="table-fill">
                                                            <thead>
                                                                <tr>
                                                                    <th >No.</th>
                                                                    <th >Name</th>
                                                                    <th >Price</th>
                                                                    <th >Discount</th>
                                                                    <th >Job Post</th>
                                                                    <th>Duration (Month)</th>
                                                                    <th>Purchase</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-hover">
                                                                @php
                                                                    $id = 1;
                                                                @endphp
                                                                @foreach($packages as $package)
                                                                <tr>
                                                                    <td>{{ $id++ }}</td>
                                                                    <td>{{ $package->name }}</td>
                                                                    <td>{{ $package->price }}</td>
                                                                    <td>{{ $package->discount }}</td>
                                                                    <td>{{ $package->job_post }}</td>
                                                                    <td>{{ $package->duration }}</td>
                                                                    <td class="text-center">
                                                                        <a href="/employer/package/{{ $package->id }}" class="buy_btn">Buy</a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="rjobs" class="tab-content">
                                            <div class="job-listings-tabs">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <table class="table-fill">
                                                            <thead>
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>Name</th>
                                                                    <th>Price</th>
                                                                    <th>Discount</th>
                                                                    <th>Type</th>
                                                                    <th>Amount</th>
                                                                    <th>Duration (Month)</th>
                                                                    <th>Purchase</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-hover">
                                                                @php
                                                                $id2 = 1;
                                                                @endphp
                                                                @foreach($featured_packages as $featured_package)
                                                                <tr>
                                                                    <td>{{ $id2++ }}</td>
                                                                    <td>{{ $featured_package->name }}</td>
                                                                    <td>{{ $featured_package->price }}</td>
                                                                    <td>{{ $featured_package->discount }}</td>
                                                                    <td class="{{ ($featured_package->featured_type) ? "text-info" : "text-success" }} bold">{{ ($featured_package->featured_type) ? "Job Feature" : "Company Feature" }}</td>
                                                                    <td>{{ $featured_package->featured_amount }}</td>
                                                                    <td>{{ $featured_package->duration }}</td>
                                                                    <td class="text-center">
                                                                        <a href="/employer/featured_package/{{ $featured_package->id }}" class="buy_btn">Buy</a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
@endsection
