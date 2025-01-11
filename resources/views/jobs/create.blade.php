<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a New Job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Please fill out the below details for the job posting.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="Job_Title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="Job_Title" id="Job_Title" placeholder="Software Engineer" required value="{{ old('Job_Title') }}" />
                            <x-form-error name="Job_Title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="Job_Salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="Job_Salary" id="Job_Salary" placeholder="$100,000 Per Year" required value="{{ old('Job_Salary') }}" />
                            <x-form-error name="Job_Salary" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/jobs" class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600" onclick="window.location='/jobs'">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>

</x-layout>