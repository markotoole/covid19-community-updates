<div class="p-md-4 p-0" style="border-radius: .25rem;">
    <div class="bg-white p-md-0 p-2">
        <p>Click on any business or community group below for details of their current services during the
            COVID19
            crisis. Let's continue giving our local businesses as much support as we can at this time.
            Please buy
            local.</p>
        <p>If you notice any changes to the listings or wish to add to it please <a href="/submit">Submit an
                Update</a> at any time.</p>
        <div class="alert alert-primary d-md-none" role="alert">
            To see status updates please turn your phone to landscape position.
        </div>
    </div>

    <div class="table-service {{$classes ?? ''}}">
        <table class="table table-striped table-bordered dt-responsive">
            <thead>
            <tr>
                <th data-priority="1" rowspan="1" colspan="1" class="all">Category</th>
                <th data-priority="1" rowspan="1" colspan="1" class="all">Name</th>
                <th>Status</th>
                @if (!($type ?? null == 'com'))
                    <th>Delivery</th>
                @endif
                @if (!($type ?? null == 'com'))
                    <th>Collection</th>
                @endif
                <th>Contact No.</th>
                <th> Website/Social Media Link</th>
                <th>Notes</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $statuses as $status)
                <tr>
                    <td>{{$status->category->name}}</td>
                    <td>{{ $status->name }}</td>
                    <td data-order="{{ $status->status == 'Open as usual' ? 1 : 0 }}">{{ $status->status}}</td>
                    @if (!($type ?? null == 'com'))
                        <td>{{ $status->delivery ? 'Yes' : 'No'}}</td>@endif
                    @if (!($type ?? null == 'com'))
                        <td>{{ $status->service_offered ? 'Yes' : 'No'}}</td>@endif
                    <td>{{ $status->phone}}</td>
                    <td><a href="{{ $status->link}}">{{ $status->link}}</a></td>
                    <td>{{ $status->notes}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
