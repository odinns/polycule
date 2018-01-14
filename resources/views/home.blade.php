@extends('layouts.content')

@push('head')
{{-- Facebook callback appends #_=_ hash underscore to the Return URL. This gets rid of it --}}
<script type="text/javascript">
    if (window.location.hash == '#_=_') {
        history.replaceState
            ? history.replaceState(null, null, window.location.href.split('#')[0])
            : window.location.hash = '';
    }
</script>
@endpush

@section('content')
<v-layout row wrap>
  <v-flex d-flex xs12 sm6 md4>
    <v-card>
      <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">{{ Auth::user()->name }}</h3>
            <div>{{ $first }} | {{ $last }}</div>
          </div>
        </v-card-title>
      <v-card-media class="black--text" src="{{ $user->getPhoto() }}" height="300px">
        {{-- <v-container fill-height fluid>
          <v-layout fill-height>
            <v-flex xs12 align-end flexbox>
              <span class="headline">{{ Auth::user()->name }} | {{ $first }} | {{ $last }}</span>
            </v-flex>
          </v-layout>
        </v-container> --}}
      </v-card-media>
      {{-- <image-uploader>
          <dropzone id="ImageUploader" url="/home/photo" :use-custom-dropzone-options=true :dropzone-options="dzOptions" v-on:vdropzone-success="showSuccess">
          </dropzone>
      </image-uploader> --}}
      <dropzone style="border: 0px" id="myVueDropzone" url="/home/photo" v-on:vdropzone-success="showSuccess" :max-file-size-in-m-b="100">
        {{ csrf_field() }}
      </dropzone>
      {{-- <v-container fluid v-bind="{ [`grid-list-xs`]: true }">
        <v-layout row wrap>
          <v-flex
            xs4
            v-for="n in 3"
            :key="n"
          >
            <v-card flat tile>
              <v-card-media
                :src="`https://unsplash.it/150/300?image=${Math.floor(Math.random() * 100) + 1}`"
                height="150px"
              >
              </v-card-media>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container> --}}
      <v-card-actions>
        @foreach (Auth::user()->tagsWithType('gender') as $tag)
          <v-chip class="primary primary--text" outline>{{ $tag->name }}</v-chip>
        @endforeach
        @foreach (Auth::user()->tagsWithType('relationship-status') as $tag)
          <v-chip>{{ $tag->name }}</v-chip>
        @endforeach
        <v-spacer></v-spacer>
      </v-card-actions>
    </v-card>
  </v-flex>
  <v-flex d-flex xs12 sm6 md3>
    <v-layout row wrap>
      <v-flex d-flex>
        <v-card color="indigo" dark>
          <v-card-text>hest</v-card-text>
        </v-card>
      </v-flex>
      <v-flex d-flex>
        <v-layout row wrap>
          <v-flex d-flex
            v-for="n in 2"
            :key="n"
            xs12
          >
            <v-card
              color="red lighten-2"
              dark
            >
            <v-card-text>hest</v-card-text>
            </v-card>
          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>
  </v-flex>
  <v-flex d-flex xs12 sm6 md2 child-flex>
    <v-card color="green lighten-2" dark>
      <v-card-text>hest</v-card-text>
    </v-card>
  </v-flex>
  <v-flex d-flex xs12 sm6 md3>
    <v-card color="blue lighten-2" dark>
      <v-card-text>hest</v-card-text>
    </v-card>
  </v-flex>

  {{-- <v-spacer></v-spacer> --}}
</v-layout>
@endsection
