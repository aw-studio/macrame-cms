<x-default-layout>
{{--
<Image
            :image="page.attributes.header"
            v-if="page.attributes.header"
            class="w-full h-64"
        /> --}}
        <div v-if="page.attributes.h1" class="container">
            <h1 class="my-16">
                {{ $page->attributes->h1 }}
            </h1>
        </div>
        <section class="container mb-16">
            <h2>Nach Personen suchen</h2>
            <div class="flex flex-wrap gap-5 mb-10">
                <div class="flex items-end w-full gap-5">
                    <div class="w-full lg:w-1/3">
                        <Input
                            v-model="filterSearch"
                            label="Suche"
                            placehoolder="Suche"
                        />
                    </div>
                    <div>
                        <x-button-primary @click="filter()"> Suche </x-button-primary>
                    </div>
                    <div class="w-full" v-if="filterSearch">
                        <x-button-primary @click="removeFilter()">
                            Filter zurücksetzen
                        </x-button-primary>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($data->people as $person)
            <div>
                {{$person}}
            </div>
            @endforeach
                <ContactCard
                    v-for="person in filteredPeople"
                    :person="person"
                />
                <div class="mt-10 col-span-full">
                    <Pagination :links="data.people.meta.links" />
                    <PaginationMobile :links="data.people.links" />
                </div>
            </div>
        </section>

</x-default-layout>
