
console.log('load')
const $usersContainer = document.querySelector('#container__users');

if ($usersContainer) {
    $usersContainer.addEventListener('click', (event) => {
        event.preventDefault();
        const { target } = event;
        const { classList, dataset: { id, url } } = target;

        if (classList.contains('js:toggleIsAdmin')) {
            target.disabled = true;
            toggleIsAdmin(id, url).then( async res => {
                const data = await res.json();
                target.checked = data.is_admin;
                target.disabled = false;
            })
        }
    });
}


function toggleIsAdmin(userId, url) {
    const token = document.querySelector('meta[name="csrf-token"]');
    return fetch(url,{
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
            'X-CSRF-TOKEN': token?.content
        },
        body: JSON.stringify({ userId })
    });
}