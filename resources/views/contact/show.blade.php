@extends('layout-admin.app')

@section('content')

    @foreach ($contacts as $contact)
    

        <div class="card shadow ml-4 mr-4 mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">{{ $contact->subject }}</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    {{ $contact->message }}
                </div>
            </div>

            <div class="collapse show bg-light font-weight-lighter" id="collapseCardExample">
                <div class="card-footer">
                    {{ $contact->name }} | {{ $contact->email }}
                </div>
            </div>
        </div>

    @endforeach

@endsection