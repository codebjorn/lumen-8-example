<script>
    Spruce.store('image', {
        base: '/api',
        gender: 'men',
        character: 'mattew',
        skinTone: 'white',
        posture: 'happy',
        characters: [],
        allSkinTones: [],
        allPostures: [],

        //getters
        userUrl() {
            return `${this.base}/${this.gender}/${this.character}`;
        },
        imageUrl() {
            return `${this.base}/${this.gender}/${this.character}/${this.skinTone}/${this.posture}`;
        },
        skinToneUrl() {
            return `${this.base}/${this.gender}/${this.character}/${this.skinTone}`;
        },
        getCharacters() {
            if (this.characters.length <= 0) {
                this.updateCharacters();
            }

            return this.characters;
        },
        getAllPostures() {
            if (this.allPostures.length <= 0) {
                this.updateAllPosture();
            }

            return this.allPostures;
        },
        getAllSkinTones() {
            if (this.allSkinTones.length <= 0) {
                this.updateAllSkinTones();
            }
            return this.allSkinTones;
        },

        //setters
        updateCharacter(character, gender = null) {
            if (gender) {
                this.gender = gender;
            }

            this.character = character;
        },
        updateSkinTone(skinTone) {
            this.skinTone = skinTone;
        },
        updatePosture(posture) {
            this.posture = posture;
        },
        updateCharacters() {
            getCharacters(`${this.base}/all`)
                .then(data => this.characters = data);

        },
        updateAllPosture() {
            getPostures(this.skinToneUrl())
                .then(data => this.allPostures = data)
        },
        updateAllSkinTones() {
            getSkinTones(this.userUrl())
                .then(data => this.allSkinTones = data);
        }
    });

    Spruce.watch('image.character', () => {
        Spruce.store('image').updateAllPosture();
        Spruce.store('image').updateAllSkinTones();
    });
    Spruce.watch('image.skinTone', () => {
        Spruce.store('image').updateAllPosture();
    });

    function select() {
        return {
            show: false,
            selected: '',
            toggle: {
                ['@click']() {
                    this.open = !this.open
                },
            },
            init(selected) {
                this.selected = selected;
            },
            close() {
                this.show = false
            },
            update(event, callback) {
                this.selected = callback(event);
            },
            isOpen: {
                ['x-show.transition.in.duration.250ms.out.duration.250ms']() {
                    return this.open
                },
                ['@click.away']() {
                    this.open = false
                },
            },
            isSelected(slug) {
                return this.selected === slug;
            },
        }
    }

    //characters
    const getCharacters = async (endpoint) => {
        return fetchData(endpoint).then(json => json);
    }

    const updateCharacter = (event) => {
        return updateSelect(event, (char, node) => {
            const gender = node.getAttribute('gender');
            Spruce.store('image').updateCharacter(char, gender);
        });
    }

    //skinTones
    const getSkinTones = async (endpoint) => {
        return fetchData(endpoint).then(json => Object.keys(json?.skinTones ?? {}));
    }

    const updateSkinTone = (event) => {
        return updateSelect(event, (skinTone) => {
            Spruce.store('image').updateSkinTone(skinTone);
        });
    }

    //postures
    const getPostures = async (endpoint) => {
        return fetchData(endpoint).then(json => Object.keys(json?.postures ?? {}));
    }

    const updatePosture = (event) => {
        return updateSelect(event, (posture) => {
            Spruce.store('image').updatePosture(posture);
        });
    }

    //misc
    const updateSelect = (event, updateCb) => {
        const node = event.currentTarget;
        const name = node.getAttribute('name');
        updateCb(name, node);
        return name;
    }

    async function fetchData(url) {
        let response = await fetch(url);
        return await response.json();
    }

</script>
