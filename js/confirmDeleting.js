function confirmDeleting(id) {
    if (confirm("Really delete?")) {
        window.location.href = `/delete.php?id=${id}`
    }
}