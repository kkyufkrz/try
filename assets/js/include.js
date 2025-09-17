function includeHTML() {
  document.querySelectorAll('[data-include]').forEach(el => {
    const file = el.getAttribute('data-include');
    fetch(file)
      .then(res => {
        if (res.ok) return res.text();
        throw new Error(`Gagal memuat ${file}`);
      })
      .then(data => el.innerHTML = data)
      .catch(err => el.innerHTML = `<p>${err.message}</p>`);
  });
}

window.addEventListener('DOMContentLoaded', includeHTML);