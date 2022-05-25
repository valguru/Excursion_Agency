// для аккаунтов
function delete_get_id (id,role_id) {
    let get_links = document.getElementsByClassName('delete-get-id');
    let start_href = "../includes/delete_account_by_admin.php?id="
    for(let i = 0; i < get_links.length; i++) {
        let href = start_href + id + '&role_id=' + role_id;
        get_links[i].setAttribute('href', href);
    }
}
function edit_get_id (id,role_id) {
    let get_links = document.getElementsByClassName('edit-get-id');
    let start_action = "../includes/edit_role.php?id=";
    for(let i = 0; i < get_links.length; i++) {
        let action = start_action + id + '&role_id=' + role_id;
        get_links[i].setAttribute('action', action);
    }
}
// для регионов
function delete_region_get_id (id) {
    let get_links = document.getElementsByClassName('delete-region-get-id');
    let start_href = "../includes/delete_region.php?id="
    for(let i = 0; i < get_links.length; i++) {
        let href = start_href + id;
        get_links[i].setAttribute('href', href);
    }
}

//для локаций
function delete_location_get_id (id,region_id) {
    let get_links = document.getElementsByClassName('delete-location-get-id');
    let start_href = "../includes/delete_location.php?id="
    for(let i = 0; i < get_links.length; i++) {
        let href = start_href + id + "&region_id=" + region_id;
        get_links[i].setAttribute('href', href);
    }
}

function edit_location_get_id (id) {
    let get_links = document.getElementsByClassName('edit-location-get-id');
    let start_action = "../includes/edit_role.php?id=";
    for(let i = 0; i < get_links.length; i++) {
        let action = start_action + id;
        get_links[i].setAttribute('action', action);
    }
}














