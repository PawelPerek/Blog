document.addEventListener("DOMContentLoaded", async () => {
		let data = await axios.get("php/get_number.php");
		let num = data.data;
		
		document.querySelector("var").innerText = num;
})