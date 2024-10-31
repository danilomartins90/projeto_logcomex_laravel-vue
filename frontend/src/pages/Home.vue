<template>
    <div class="container">
        <div class="row justify-content-center mt-4 mb-4">
            <div class="col-12 text-center">
                <h1>Lista de Pokémons</h1>
            </div>
        </div>
        <div class="row mb-3">
            <h3>Filtro</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Filtrar por nome:</label>
                <input type="text" class="form-control" 
                v-model="filterName"
                @keyup.enter="fetchPokemons"/>
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-secondary me-2"
                @click="fetchPokemons">Filtrar</button>

                <button type="button" class="btn btn-secondary"
                @click="clearFilter">Limpar</button>
            </div>
        </div>
        <div v-if="errorMessage" class="alert alert-danger">
            {{ errorMessage }}
        </div>
        <div v-else-if="noPokemonMessage" class="alert alert-info">
            {{ noPokemonMessage }}
        </div>
        <div v-if="pokemons.length">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="pokemon in pokemons" :key="pokemon.id">
                        <th scope="row">{{ pokemon.id }}</th>
                        <td>{{ pokemon.name }}</td>
                        <td>
                            <button type="button" class="btn btn-secondary"
                            @click="viewDetails(pokemon.id)">Ver detalhes</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div v-else-if="loading">
            Carregando Pokémons...
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import config from '../../config.json';

const router = useRouter();
const pokemons = ref([]);
const filterName = ref('');
const errorMessage = ref('');
const noPokemonMessage = ref('');
const loading = ref(true);

const fetchPokemons = async () => {
    errorMessage.value = '';
    noPokemonMessage.value = '';
    loading.value = true;

    try {
        let url = `${config.API_URL}/pokemons`;

        if (filterName.value) {
            url += `?name=${filterName.value}`;
        }

        const response = await fetch(url);

        if (!response.ok) {
            throw new Error('Erro ao buscar os dados da API');
        }

        pokemons.value = await response.json();

        if (Array.isArray(pokemons.value) && pokemons.value.length === 0) {
            noPokemonMessage.value = 'Nenhum Pokémon encontrado.';
        }

    } catch (error) {
        errorMessage.value = 'Tivemos um problema. Por favor, tente novamente.';
        console.error(error);
    } finally {
        loading.value = false;
    }
};

const clearFilter = () => {
    filterName.value = '';
    fetchPokemons();
};

const viewDetails = (id) => {
    router.push({ name: 'Detail', params: { id } });
};

onMounted(fetchPokemons);
</script>