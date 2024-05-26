function confirmDelete(transactionDetailId) {
    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Apakah anda ingin menghapus data?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus",
    }).then((result) => {
        if (result.isConfirmed) {
            document
                .getElementById(
                    "deleteDetailTransactionForm" + transactionDetailId
                )
                .submit();
        }
    });
}

function confirmSubmission(transactionDetailId) {
    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Apakah anda ingin menyimpan perubahan data?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Simpan!",
    }).then((result) => {
        if (result.isConfirmed) {
            document
                .getElementById("editDetailTransactionForm" + transactionDetailId)
                .submit();
        }
    });
}
