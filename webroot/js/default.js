$(function () {
    const actualPath = window.location.pathname;
    const navBtnElement = $("#side-bar-container").find(
        `a[href='${actualPath}']`
    );
    if (navBtnElement?.length) {
        $(navBtnElement[0]).removeClass("text-white");
        $(navBtnElement[0]).addClass("active");
    }

    const logoutLink = document.getElementById("logout-link");
    logoutLink.onclick = null;

    $(logoutLink).on("click", function (event) {
        event.preventDefault();

        Swal.fire({
            title: "Tem certeza?",
            text: "Você será desconectado.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim, sair!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                $(logoutLink).parent().find("form").submit();
            }
        });
    });
});
