<table>
    <thead>
        <tr>
            <th>Form Filled On</th>
            <th>Open Call</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Phone</th>
            <th>Website Link</th>
            <th>Instagram Link</th>
            <th>Art Work Title</th>
            <th>Art Work Size</th>
            <th>Art Work Medium</th>
            <th>Art Work Image</th>
            <th>Other Fields</th>
            <th>Comment</th>
        </tr>
    </thead>
    <tbody>
        @foreach($responses as $row)
        <tr>
            <td>{{ $row->created_at}}</td>
            <td>{{ $row->opencall->title}}</td>
            <td>{{ $row->name}}</td>
            <td>{{ $row->email}}</td>
            <td>{{ $row->phone}}</td>
            <td>{{ $row->website_link}}</td>
            <td>{{ $row->instagram_link}}</td>
            <td>
                @forelse ($row->art_work_title as $data)
                    <p>- {{$data}}</p>
                @empty
                    <p>N/A</p>
                @endforelse
            </td>
            <td>
                @forelse ($row->art_work_size as $data)
                <p>- {{$data}}</p>
                @empty
                    <p>N/A</p>
                @endforelse
            </td>
            <td>
                @forelse ($row->art_work_medium as $data)
                <p>- {{$data}}</p>
                @empty
                    <p>N/A</p>
                @endforelse
            </td>
            <td>
                @forelse ($row->art_work_image as $data)
                <p>- <a href="{{$data}}">View Image</a></p>
                @empty
                    <p>N/A</p>
                @endforelse
            </td>
            <td>
                @forelse ($row->other_field as $data)
                    @foreach ($data as $title => $value)
                    <p>- {{ $title }}  : {{ is_array($value) ? json_encode($value) : $value }}</p>
                    @endforeach
                @empty
                    <p>N/A</p>
                @endforelse
            </td>
            <td>{{ $row->comment }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
