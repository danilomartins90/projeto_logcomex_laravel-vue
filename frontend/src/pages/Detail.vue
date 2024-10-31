<template>
    <div class="container">
        <div class="row">
            <div v-if="loading" class="text-center">Carregando detalhes do Pokémon...</div>
            <div v-else>
                <div class="card mt-4" style="width: 100%;">
                    <div class="card-body">
                        <h5>Nome: {{ pokemon.name }}</h5>
                        <p>Altura: {{ pokemon.height }}</p>
                        <p>Peso: {{ pokemon.weight }}</p>
                        <ul>
                            <li v-for="(type, index) in pokemon.type" :key="index">{{ type.type.name }}</li>
                        </ul>
                        <button type="button" class="btn btn-secondary"
                        @click="backToHome">Voltar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import config from '../../config.json';

const router = useRouter();
const route = useRoute();

const pokemon = ref({});
const loading = ref(true);

const fetchPokemonDetails = async (id) => {
    try {
        const response = await fetch(`${config.API_URL}/pokemons/${id}`);

        if (!response.ok) {
            throw new Error('Erro ao buscar detalhes do Pokémon');
        }

        pokemon.value = await response.json();

    } catch (error) {
        console.error(error);
    } finally {
        loading.value = false;
    }
};

const backToHome = () => {
    router.push({ name: 'Home' });
};

onMounted(() => {
    const pokemonId = route.params.id;
    fetchPokemonDetails(pokemonId);
});
</script>
