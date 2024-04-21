app.get('/add-product', (req, res) => {
    res.sendFile(path.join(staticPath, "addproduct.php"));
})