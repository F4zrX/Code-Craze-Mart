$.ajax({
    method: "GET",
    url: "/games", // Ubah sesuai dengan URL yang sesuai untuk mendapatkan data game
    dataType: "json", // Data yang diambil adalah JSON
    contentType: "application/json",
    success: function(res) {
        console.log("List of games:", res);
    },
    error: function(xhr, status, error) {
        console.error("Error:", error);
    }
});

console.log("Testing");