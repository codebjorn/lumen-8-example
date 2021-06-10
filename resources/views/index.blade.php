<!DOCTYPE html>
<html lang="en">
<x-head/>
<x-body>
    <x-title/>
    <div class="bg-white shadow rounded shadow-xl w-full p-5 flex-1 flex">
        <x-image src="$store.image.imageUrl()" alt="memoji"/>
        <div class="flex-1 px-2">
            <x-select label="Character"
                      selected="mattew"
                      elements="$store.image.getCharacters()"
                      isSelected="element.slug"
                      updateFunction="updateCharacter"
                      elementName="element.slug"
                      elementAttributes=":gender=element.gender"
            />
            <x-select label="Skin Tone"
                      selected="white"
                      elements="$store.image.getAllSkinTones()"
                      isSelected="element"
                      updateFunction="updateSkinTone"
                      elementName="element"
            />
            <x-select label="Posture"
                      selected="happy"
                      elements="$store.image.getAllPostures()"
                      isSelected="element"
                      updateFunction="updatePosture"
                      elementName="element"
            />
        </div>
    </div>
</x-body>
</html>
