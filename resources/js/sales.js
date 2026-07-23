// import { Datepicker } from 'flowbite';

// const $datepickerEl = document.getElementById('datepicker-format');

// const options = new Datepicker($datepickerEl, {
//     defaultDatepickerId: null,
//     autohide: false,
//     format: 'yyyy/mm/dd',
//     maxDate: null,
//     minDate: null,
//     orientation: 'top',
//     buttons: false,
//     autoSelectToday: false,
//     title: null,
//     rangePicker: false,
//     onShow: () => { },
//     onHide: () => { },
// });

// const instanceOptions = {
//     id: 'datepicker-format',
//     override: true
// };

// const datepicker = new Datepicker($datepickerEl, options, instanceOptions);
// console.log(datepicker.getDate())

// console.log(datepicker.getDatepickerInstance())

// $datepickerEl
//     .addEventListener('change', function (e) {
//         console.log('Selected date:', e.target.value);
//         let rawDate = new Date(e.target.value);
//         let formatted = rawDate.toISOString().split('T')[0];
//         console.log('Formatted date:', formatted);
//         fetch('/sales/filter?date=' + formatted)
//             .then(response => response.json())
//             .then(data => {
//                 let tbody = document.getElementById('sales-table-body');
//                 tbody.innerHTML = '';

//                 if (data.length === 0) {
//                     tbody.innerHTML = `
//                         <tr>
//                             <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap bg-neutral-secondary-soft">
//                                 No sales found.
//                             </th>
//                         </tr>`;
//                 } else {
//                     data.forEach(sale => {
//                         tbody.innerHTML += `
//                             <tr class="border-b border-default">
//                                 <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap bg-neutral-secondary-soft">
//                                     <a href="/sales/${sale.id}">${sale.product.code}</a>
//                                 </th>
//                                 <td class="px-6 py-4">${sale.quantity}</td>
//                                 <td class="px-6 py-4 bg-neutral-secondary-soft">${sale.price}</td>
//                                 <td class="px-6 py-4">${sale.payment_type}</td>
//                             </tr>`;
//                     });
//                 }
//             });
//     });


