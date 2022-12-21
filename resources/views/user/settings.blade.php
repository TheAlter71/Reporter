<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Settings | Reporter'}}
    </x-slot>
    <x-user.partials.navbar />

    <main>
        <section class="section">
            <div class="container">
                <x-user.partials.alert />
                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="breadcrumbs mb-4"> <a href="{{ route('home') }}">Home</a>
                            <span class="mx-1">/</span> <a href="#">Settings</a>
                        </div>
                    </div>

                </div>

                <div class="row no-gutters-lg">
                    <div class="col-12">
                        <h2 class="section-title">Additional Settings</h2>
                        <hr>
                    </div>
                </div>

                <div class="widget">
                    <form action="#">
                        <div class="widget-body mt-4">
                            <div class="form-group">
                                <label for="cover">Change Avatar</label>
                                <input type="file" name="avatar" class="form-control" id="cover"
                                    aria-describedby="emailHelp">
                                @error('primary_image')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                                <small id="emailHelp" class="form-text text-muted">The ideal ratio of primary image is
                                    1:1 (square), The
                                    image will be crop to fit if it is not maintain the exact ratio.</small>

                            </div>
                        </div>

                        <div class="widget-body mt-4">
                            <div class="form-group">
                                <label for="cover">Change Mailing Address</label>
                                <input type="email" name="avatar" class="form-control" id="cover"
                                    value="{{ auth()->user()->profile->mail }}" aria-describedby="emailHelp">
                                @error('primary_image')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                                <small id="emailHelp" class="form-text text-muted">Change mailing adrress does not
                                    affect your account. You can still be able to log in with your actual email
                                    address.</small>
                            </div>
                        </div>

                        <div class="widget-body mt-4">
                            <div class="form-check ml-2">
                                <input class="form-check-input" style="margin-top: 7px;" type="checkbox" value=""
                                    id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Hide Mail Address
                                </label>
                            </div>
                        </div>

                        <div class="widget-body mt-4">
                            <div class="form-check ml-2">
                                <input class="form-check-input" style="margin-top: 7px;" type="checkbox" value=""
                                    id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Apply for badge
                                </label>
                            </div>
                        </div>

                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>

            </div>
        </section>

        <x-user.partials.footer />

</x-user.master>