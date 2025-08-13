// import "../css/app.css";
import { hyphenate } from "hyphen/en";



document.addEventListener("livewire:navigated", (e) => {

	const hyphens = document.querySelectorAll(".hyphens-auto");
	hyphens.forEach(async (element) => {
		const result = await hyphenate(element.innerHTML);
		element.innerHTML = result;
	});

});