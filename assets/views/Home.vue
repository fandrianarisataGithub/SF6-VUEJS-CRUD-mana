<template>
  <div>
    <FormAddcontact />
    <div class="mx-5 result-table">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Foction</th>
					<th>Tél Standard</th>
					<th>Tél fixe</th>
					<th>Tél mobile</th>
					<th>Email</th>
					<th>Profile linkedIn</th>
					<th>Action marketing</th>
					<th>Bâtiment rattaché</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr 
					v-for="m in getMembers"
					:key="m.id"
				>
					<td>{{ m.id }}</td>
					<td>{{ m.hisFunction }}</td>
					<td>
						<a :href="'to:' + m.sTel">
							<span class="fa fa-phone-square"></span>
							{{ m.sTel }}
						</a>
					</td>
					<td>
						<a :href="'to:' + m.fTel">
							<span class="fa fa-phone"></span>
							{{ m.fTel }}
						</a>
					</td>
					<td>
						<a :href="'to:' + m.mTel">
							<span class="fa fa-mobile-phone"></span>
							{{ m.mTel }}
						</a>
					</td>
					<td>
						<a :href="'mailto:' + m.email">{{ m.email }}</a>
					</td>
					<td><a :href="m.linkedIn">{{ m.linkedIn }}</a></td>
					<td>{{ m.marketingName }}</td>
					<td>{{ m.bName }}</td>
					<td>
						<div class="list-btn d-flex justify-content-start align-items-center">
							<button class="btn btn-info button-look">
								<span class="fa fa-eye"></span>
							</button>
							<button class="btn btn-primary mx-2 button-primary">
								<span class="fa fa-pencil"></span>
							</button>
							<button class="btn btn-danger button-danger">
								<span class="fa fa-trash"></span>
							</button>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
    </div> 
  </div>
</template>

<script>
import {
  mapActions,
  mapGetters,
} from 'vuex';

import FormAddcontact from '../components/FormAddContact.vue';

export default {
	name: "HomePage",
	data(){
		return {
			members : []
		}
	},
	components : {
		FormAddcontact
	},
	computed : {
		...mapGetters(["isLoading", "getMembers"])
	},
	created(){
		this.$store.dispatch('fetchAllMembers')
			.then(members => {
			this.members = members;
		})
	},
	
	methods : {
		...mapActions(["fetchAllMembers"])
	}
};
</script>
