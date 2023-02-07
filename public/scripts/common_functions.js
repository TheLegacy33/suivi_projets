document.addEventListener('DOMContentLoaded', () => {
	if (document.querySelector("[data-action=deletelink]")){
		document.querySelectorAll("[data-action=deletelink]").forEach((link) => {
			link.addEventListener('click', (e) => {
				e.preventDefault();
				if (confirm('Est-ce que vous êtes sûr de vouloir supprimer cette donnée ?')){
					location.href = link.getAttribute('href');
				}else{
					return false;
				}
			});
		});
	}
});