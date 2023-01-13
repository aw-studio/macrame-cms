<footer class="w-screen py-12 mt-auto bg-secondary-100">
    <div class="container">
        <h3>
            <span class="inline-block">
                E-Mail:
                <a href="mailto:{{$data->email}}">{{$data->email}}</a>
            </span>
            <br />
            <span class="inline-block">
                Telefon: {{ $data->phone }}
            </span>
        </h3>
        <div>
            <span class="inline-block">Firma XYZ</span> <br />
            <span class="inline-block">Straße XYZ</span> <br />
            <span class="inline-block">PLZ/ Stadt XYZ</span> <br />
        </div>
        <ul class="flex items-center justify-end gap-10 pt-10">
            @foreach ($navigation as $entry )
            <li>
                <a :href="entry.link" class="font-semibold text-primary">
                    {{ $entry->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</footer>
