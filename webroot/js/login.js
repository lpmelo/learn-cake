$(function () {
    $(".btn-primary").on("click", function (event) {
        event.preventDefault();
        const formData = $("form").serialize();

        $(".btn-primary").addClass("disabled");

        $.ajax({
            url: "/authentications/login",
            data: formData,
            method: "POST",
        })
            .done(function (res) {
                if (res?.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Autenticado com sucesso!",
                        text: res?.message,
                    });
                    
                    window.location.replace("/home");
                }
                $(".btn-primary").removeClass("disabled");
            })
            .catch((err) => {
                Swal.fire({
                    icon: "error",
                    title: "Erro ao autenticar",
                    text: err?.responseJSON?.message,
                });
                $(".btn-primary").removeClass("disabled");
            });
    });
});
