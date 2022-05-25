<template>
    <Cardboard title="view" title-class="bg-blue-400">
        <div class="grid grid-cols-2 p-1.5 gap-1">
            <TabLink name="something" use-class="space-x-2 px-2">
                <Icon>
                    <Airplane />
                </Icon>
            </TabLink>
            <TabLink name="something" use-class="space-x-2 px-2">
                <Icon>
                    <Airplane />
                </Icon>
            </TabLink>
        </div>
    </Cardboard>
</template>

<script lang="ts" setup>
import { Icon } from '@vicons/utils';
import Airplane from '@vicons/ionicons5/Airplane';

import Cardboard from '@/Components/Cardboard.vue';
import TabLink from '@/Components/TabLink.vue';
</script>
