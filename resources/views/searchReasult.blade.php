<div>
    <div class="container mt-3">
        <div class="row">
            @foreach($events as $event)
                <div class="col-lg-4">
                    <div class="card card-margin">
                        <div class="card-body pt-0">
                            <div class="widget">
                                <div class="widget-title-wrapper">
                                    <div class="widget-date-primary">
                                        <span class="widget-date-day">YE</span>
                                        <span class="widget-date-month">57k</span>
                                    </div>
                                    <div class="widget-meeting-info">
                                        <h4 class="widget-pro-title">{{$event->title}}</h4>
                                        <span class="widget-meeting-time">{{$event->date}}</span>
                                    </div>
                                </div>
                                <ul class="widget-meeting-points">
                                    <li class="widget-meeting-item"><span>Location: {{$event->localisation}}</span></li>
                                    <li class="widget-meeting-item"><span>The Categorie: {{ $event->categorie->categorie_name }}</span></li>
                                </ul>
                                <div class="widget-meeting-action">
                                    <a href="{{ route('event.details', $event->id) }}" class="btn btn-sm btn-flash-border-primary">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
