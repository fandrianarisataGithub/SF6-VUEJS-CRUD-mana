<template>
    <div class="bloc-form-add-contact">
        <div class="my-5 w-50 btn-title d-flex justify-content-center align-items-center">
            <button class="element-button-title d-flex flex-column justify-content-center align-items-center">
                <span class="fa fa-plus"></span>
                <span>AJOUTER CONTACT</span>
            </button>
        </div>
        <form action="" class="m-5 d-flex justify-content-between flex-wrap">
            <div class="px-3 part-form w-50">
                <div 
                    :class="{ error: v$.member.hisFunction.$errors.length }"
                    class="form-group">
                    <label for="">Fonction</label>
                    <input v-model="member.hisFunction" type="text" class="form-control">
                    <div class="input-errors" v-for="error of v$.member.hisFunction.$errors" :key="error.$uid">
                        <div class="error-msg">{{ error.$message }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Tél standard</label>
                    <input v-model="member.sPhone" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tél fixe</label>
                    <input v-model="member.fPhone" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tél mobile</label>
                    <input v-model="member.mPhone" type="text" class="form-control">
                </div>
            </div>
            <div class="px-3 part-form w-50">
                <div class="form-group">
                    <label for="">Email</label>
                    <input v-model="member.email" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Profil linkedIn</label>
                    <input v-model="member.linkedIn" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Action marketing</label>
                    <select class="form-control" v-model="member.marketing" name="" id="">
                        <option 
                            v-for="m in getMarketings" 
                            :value="m.id"
                            :key="m.id"
                        >
                            {{ m.name }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Bâtiment rattaché</label>
                    <select class="form-control" v-model="member.building" name="" id="">
                        <option 
                            v-for="b in getBuildings" 
                            :value="b.id"
                            :key="b.id"
                        >
                            {{ b.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="px-3 part-form w-50">
                <div v-if="withErrorBeforeSubmin" class="bg-danger text-white p-2 mt-1 mb-3">
                    Veuillez remplir correctement tous les champs
                </div>
                <div class="list-btn d-flex justify-content-center align-items-center">
                    <button class="mx-2 element-button element-button-secondary">Annuler</button>
                    <button  
                        @click.prevent="makeStoreMember" 
                        class="mx-2 element-button element-button-primary"
                    >
                        {{ getIsCreatingMember ? 'Patienter...' : 'Ajouter' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
import { nextTick } from 'vue';

import {
  mapActions,
  mapGetters,
} from 'vuex';

import { useVuelidate } from '@vuelidate/core';
import {
  email,
  required,
} from '@vuelidate/validators';

export default {
    name : 'FormAddcontact',
    setup () {
        return { v$: useVuelidate() }
    },
    data(){
        return {
            buildings : [],
            marketings : [],
            isCreatingMember : false,
            withErrorBeforeSubmin : false,
            member : {
                hisFunction : '',
                sPhone : '',
                fPhone : '',
                mPhone : '',
                email : '',
                linkedIn : '',
                marketing : '',
                building : ''
            }
        }
    },
    validations () {
        return {
            member : {
                hisFunction: { required }, 
                sPhone: { required }, 
                fPhone: { required }, 
                mPhone: { required }, 
                email: { required, email }, 
                linkedIn: { required }
            }
        }
    },
    computed : {
        ...mapGetters(["getBuildings", "getMarketings", "getIsCreatingMember"])
    },
    created(){
		this.$store.dispatch('fetchAllBuildings')
			.then(buildings => {
				this.buildings = buildings;
		})
        this.$store.dispatch('fetchAllMarketings')
			.then(marketings => {
				this.marketings = marketings;
		})
	},
	mounted(){
		console.log(this.$store.marketings)
	},
	methods : {
		...mapActions(["fetchAllBuildings", "fetchAllMarketings", "storeMember" ]),
        async makeStoreMember() {
            const result = await this.v$.$validate()
            if(!result) {
                
                this.withErrorBeforeSubmin = true;
                
                return 
            }else{
               await this.$store.dispatch('storeMember', this.member);
                this.withErrorBeforeSubmin = false;
            }
        }
	}

}
</script>