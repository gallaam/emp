
<script>
import { Bar } from 'vue-chartjs'

export default {
	extends: Bar,

	methods: {

      async read() {
        let Names = new Array("Amir","radik");
        let Salary = new Array(2000, 1500);
        const { data } = await window.axios.get('/api/employees');
        data.forEach(element => {
						Names.push(element.name);
						Salary.push(element.salary);
				});
        this.renderChart({ labels: Names, datasets: [{ label: 'Salary', backgroundColor: '#FC2525', data: Salary }] });
      }
    },
	
	created() {
      this.read();
    }
 
}
</script>
