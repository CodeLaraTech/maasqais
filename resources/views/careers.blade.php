@extends('layouts.main')
@include('partials.pages.title-meta-tags')
@section('content')
<!-- Header Banner -->
<section class="banner-header section-padding bg-img" data-overlay-dark="5" data-background="{{url('img/slider/1.jpg')}}">
  <div class="v-middle">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center mt-30">
          <h1><span>Careers</span></h1>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Divider Line -->
<div class="line-vr-section mb-30 mt-30"></div>

<!-- Multi Filter -->
<div class="container mb-30">
  <div class="filters">
    <!-- Filter By Job Category -->
    <select class="filter_style" id="position-filter">
      <option value="">All Job Categories</option>
      <option value="costing">Costing</option>
      <option value="design">Design</option>
      <option value="sales">Sales</option>
    </select>

    <!-- Filter By Job Type -->
    <select class="filter_style" id="department-filter">
      <option value="">All Job Types</option>
      <option value="annual">Annual</option>
      <option value="part-time">Part Time</option>
      <option value="freelance">Freelance</option>
    </select>

    <!-- Filter By Location -->
    <select class="filter_style" id="location-filter">
      <option value="">All Locations</option>
      <option value="Riyadh">Riyadh</option>
      <option value="Jeddah">Jeddah</option>
    </select>

    <!-- Apply Filters Button -->
    <button onclick="applyFilters()" class="filter_button">Apply Filters</button>
  </div>

  <!-- Jobs Table -->
  <table>
    <thead>
      <tr>
        <th id="jobtittleStyle">Job Title</th>
        <th>Job Category</th>
        <th>Location</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jobs as $job)
      <tr>
        <td ><a href="{{ route('job.show', $job->id) }}"><strong>{{ $job->title }}</strong></a></td>
        <td>{{ $job->category }}</td>
        <td>{{ $job->location }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Contact Section -->
@include('partials.contact-section')
@endsection
