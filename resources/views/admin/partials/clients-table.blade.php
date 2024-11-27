@if ($clients->isEmpty())
    <div class="text-center font-semibold text-lg">No Clients Found</div>
@else
    <div class="relative overflow-x-auto mt-3">
        <table id="client-table" class="table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-indigo-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-indigo-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Client Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contact Person
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Is Active
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 whitespace-nowrap font-medium">
                            {{ $client->client_name }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap font-medium">
                            {{ $client->first_name }} {{ $client->last_name }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap font-medium">
                            {{ $client->email }}
                        </td>

                        <td class="px-6 py-4">
                            @if ($client->phone)
                            {{ $client->country_code }}{{ $client->phone }}
                            @endif
                            
                        </td>

                        <td class="px-6 py-4">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" data-id="{{ $client->id }}"
                                    class="ClientIsActiveToggle sr-only peer"
                                    @if ($client->is_active) @checked(true) @endif>
                                <div
                                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                </div>
                            </label>
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <span onclick="showDiv('ClientModal')" class="mr-4 cursor-pointer edit_client_btn"
                                data-id="{{ $client->id }}" data-name="{{ $client->client_name }}">
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

                            <span class="delete_client_btn cursor-pointer" data-id="{{ $client->id }}">
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
     if (document.getElementById("client-table") && typeof simpleDatatables.DataTable !== 'undefined') {
                const dataTable = new simpleDatatables.DataTable("#client-table", {
                    perPage: 10,
                    perPageSelect: false,
                    searchable: false,
                    sortable: true,
                    responsive: true,
                    scrollX: true,

                });
            }

    $(function() {
        $('.ClientIsActiveToggle').change(function() {
            var clientId = $(this).attr('data-id');
            var isActive = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('client.isActiveToggle') }}",
                type: 'POST',
                data: {
                    client_id: clientId,
                    is_active: isActive,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.success == true) {
                        toastr.info(data.msg);
                        // location.reload();
                    } else {
                        toastr.info(data.msg);
                    }
                }
            });
        });

        $('.edit_client_btn').on('click', function() {
            var clientId = $(this).attr('data-id');
            $("#client_id").val(clientId);

            var url = '{{ route('clients.edit', ':clientId') }}';
            url = url.replace(':clientId', clientId);

            $.ajax({
                url: url,
                type: "GET",
                success: function(data) {
                    if (data.success == true) {
                        var client = data.data;
                        if (client.is_individual == 1) {
                            $("#individual-radio").prop("checked", true);
                            $("#company-radio").prop("checked", false);
                        } else {
                            $("#company-radio").prop("checked", true);
                            $("#individual-radio").prop("checked", false);
                        }

                        $("#client_name").val(client.client_name);
                        $("#individual_first_name").val(client.first_name);
                        $("#individual_last_name").val(client.last_name);
                        $("#country_code").val(client.country_code);
                        $("#country_code_btn").val(client.country_code);
                        $("#phone").val(client.phone);
                        $("#email").val(client.email);
                        $("#whatsapp").val(client.whatsapp);
                        $("#address").val(client.address);
                        $("#country_id").val(client.country_id);
                        $("#country_id_btn").val(client.country.country_name);
                        $("#state_id").val(client.state_id);
                        $("#state_id_btn").val(client.state.state_name);

                        $("#city_id").val(client.city_id ? client.city_id : "");
                        $("#city_id_btn").val(client.city_id ? client.city.city_name : "");
                        $("#zip_code").val(client.zip_code);
                        $("#registration_type").val(client.registration_type).change();

                        $("#gst_no").val(client.gst_no);
                        $("#state_code").val(client.state_code);


                        $("#pan_card").val(client.pan_card);
                        if (client.bank_details === null) {
                            $("#bank_name").val("");
                            $("#account_number").val("");
                            $("#ifsc").val("");
                            $("#beneficiary").val("");
                        } else {
                            $("#bank_name").val(client.bank_details.bank_name);
                            $("#account_number").val(client.bank_details.account_number);
                            $("#ifsc").val(client.bank_details.ifsc);
                            $("#beneficiary").val(client.bank_details.beneficiary);
                        }

                        $("#first_name").val(client.first_name);
                        $("#last_name").val(client.last_name);

                        toggleFields();

                    } else {
                        toastr.info(data.msg);
                    }
                }
            })
        });

        $('.delete_client_btn').on('click', function() {
            const clientId = $(this).data('id');

            if (confirm('Are you sure you want to delete this client?')) {
                $.ajax({
                    url: `{{ route('clients.destroy', ':id') }}`.replace(':id', clientId),
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.msg);
                            $('#clients-styled-tab').trigger('click');
                        } else {
                            toastr.error(response.msg);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the client.');
                    }
                });
            }

        });
    });
</script>
