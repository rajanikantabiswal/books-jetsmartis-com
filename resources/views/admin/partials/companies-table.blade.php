@if ($companies->isEmpty())
    <div class="text-center font-semibold text-lg">No Companies Found</div>
@else
    <div class="relative overflow-x-auto mt-3" id="companies-inner-table">
        <table class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-indigo-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-indigo-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Company Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Display Name
                    </th>
                   
                    <th scope="col" class="px-6 py-3">
                        Active
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 whitespace-nowrap font-medium">
                            {{ $company->company_name }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap font-medium">
                            {{ $company->display_name }}
                        </td>


                        <td class="px-6 py-4">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" data-id="{{ $company->id }}"
                                    class="CompanyIsActiveToggle sr-only peer"
                                    @if ($company->is_active) @checked(true) @endif>
                                <div
                                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                </div>
                            </label>
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <span class="mr-4 cursor-pointer edit_company_btn" data-id="{{ $company->id }}"
                                data-name="{{ $company->company_name }}" data-display-name="{{ $company->display_name }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24" color="#417505" fill="none">
                                    <path
                                        d="M16.4249 4.60509L17.4149 3.6151C18.2351 2.79497 19.5648 2.79497 20.3849 3.6151C21.205 4.43524 21.205 5.76493 20.3849 6.58507L19.3949 7.57506M16.4249 4.60509L9.76558 11.2644C9.25807 11.772 8.89804 12.4078 8.72397 13.1041L8 16L10.8959 15.276C11.5922 15.102 12.228 14.7419 12.7356 14.2344L19.3949 7.57506M16.4249 4.60509L19.3949 7.57506"
                                        stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                    <path
                                        d="M18.9999 13.5C18.9999 16.7875 18.9999 18.4312 18.092 19.5376C17.9258 19.7401 17.7401 19.9258 17.5375 20.092C16.4312 21 14.7874 21 11.4999 21H11C7.22876 21 5.34316 21 4.17159 19.8284C3.00003 18.6569 3 16.7712 3 13V12.5C3 9.21252 3 7.56879 3.90794 6.46244C4.07417 6.2599 4.2599 6.07417 4.46244 5.90794C5.56879 5 7.21252 5 10.5 5"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>

                            <span class="delete_company_btn cursor-pointer" data-id="{{ $company->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24" color="#d0021b" fill="none">
                                    <path
                                        d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M3 5.5H21M16.0557 5.5L15.3731 4.09173C14.9196 3.15626 14.6928 2.68852 14.3017 2.39681C14.215 2.3321 14.1231 2.27454 14.027 2.2247C13.5939 2 13.0741 2 12.0345 2C10.9688 2 10.436 2 9.99568 2.23412C9.8981 2.28601 9.80498 2.3459 9.71729 2.41317C9.32164 2.7167 9.10063 3.20155 8.65861 4.17126L8.05292 5.5"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M9.5 16.5L9.5 10.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M14.5 16.5L14.5 10.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<script>
    $(document).ready(function() {
        $('.edit_company_btn').on('click', function() {
            const companyId = $(this).data('id');
            const companyName = $(this).data('name');
            const companyDisplayName = $(this).data('display-name');
            $('#edit_company_id').val(companyId);
            $('#edit_company_name').val(companyName);
            $('#edit_display_name').val(companyDisplayName);
            $('#editCompany').attr('action', `{{ url('company') }}/${companyId}`);
            $('#editCompanyModal').removeClass('hidden');
        });

        $('#editCompany').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success === true) {
                        toastr.clear(); toastr.success(response.msg);
                        $('#editCompanyModal').addClass('hidden');
                        $('#companies-styled-tab').trigger('click');
                    } else {
                        toastr.clear(); toastr.error(response.msg);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    toastr.clear(); toastr.error('An error occurred while updating company.');
                }
            });
        });

        $('.delete_company_btn').on('click', function() {
            const companyId = $(this).data('id');
            if (confirm('Are you sure you want to delete this company?')) {
                $.ajax({
                    url: `/company/${companyId}`,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.clear(); toastr.success(response.msg);
                            $('#companies-styled-tab').trigger('click');
                        } else {
                            toastr.clear(); toastr.error(response.msg);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        toastr.clear(); toastr.error('An error occurred while deleting the company.');
                    }
                });
            }

        });

        $('.CompanyIsActiveToggle').change(function() {
            var companyId = $(this).attr('data-id');
            var isActive = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('company.isActiveToggle') }}",
                type: 'POST',
                data: {
                    company_id: companyId,
                    is_active: isActive,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.success == true) {
                        toastr.clear(); toastr.info(data.msg);
                        // location.reload();
                    } else {
                        toastr.clear(); toastr.info(data.msg);
                    }
                }
            });
        });
    });
</script>
